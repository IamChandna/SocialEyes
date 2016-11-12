<?php
include_once '../postgres/query.php';
$o=new query();
$arr = array();

if (!empty($_POST['keywords'])) {
	$keywords = $db->real_escape_string($_POST['keywords']);
	$sql = "SELECT ID, post_title FROM wp_posts WHERE post_content LIKE '%".$keywords."%' AND post_status = 'publish'";
	$result = $db->query($sql) or die($mysqli->error);
	if ($result->num_rows > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('id' => $obj->ID, 'title' => $obj->post_title);
		}
	}
}
echo json_encode($arr);
