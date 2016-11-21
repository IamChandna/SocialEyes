<?php
session_start ();
if (! isset ( $_SESSION ['user'] )) {
	header ( 'Location: login.php' );
	exit ( 0 );
}
$root = "";
include '../src/postgres/query.php';
$o = new query ();
$_SESSION ['user'] ['root'] = $root;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Settings</title>
<link rel="stylesheet" href="css/normalize.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/settings.css" />
<link href="css/jquery-ui.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/toastr.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/toastr.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pusher.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/status.js"></script>
<script type="text/javascript">var root="";</script>
<script type="text/javascript" src="js/particles.min.js"></script>
<script src="js/app.js"></script>
</head>
<body>
	<div id="particles-js"
		style="position: fixed; height: 100%; width: 100%;">
	</div>
	
	<?php include "php/topNavBar.php";?>

	<div class="col-xs-8 col-xs-offset-1 col-sm-8 col-sm-offset-1 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-1">

		<div class="jumbotron">
			<h1>Settings</h1>
				<hr>
				<div class="container">
							<ul class="nav nav-tabs">
								<li role="presentation"><button id="button1Style" class="btn btn-primary" onclick="document.getElementById('bio-sect').className='bio-sect mode0';">
									<i class="fa fa-cogs"></i>  Change Info 
									</button>
								</li>
								<li role="presentation"><button id="button2Style" class="btn btn-primary" onclick="document.getElementById('bio-sect').className='bio-sect mode1';">
									<i class="fa fa-camera"></i>  Change Pic 
									</button>
								</li>
								<li role="presentation"><button id="button3Style" class="btn btn-primary" onclick="document.getElementById('bio-sect').className='bio-sect mode2';">
									 <i class="fa fa-key"></i>  Security
									</button></li>
							</ul>
					
					<div class="bio-sect mode0" id="bio-sect">
						<div class="security">
							<h3>Change Security Info</h3>
							<form action="../src/settings/updateBasic.php" method="POST">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="uname">
									</div>
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" name="email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Current Password" aria-describedby="basic-addon1" name="opass">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="New Password" aria-describedby="basic-addon1" name="pass">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Retype New Password" aria-describedby="basic-addon1" name="rpass">
							</div>
							<div class="form-group">
								<button type="submit" id="buttonStyle" class="form-control btn btn-primary">Update Info</button>
							</div>
							</form>
						</div>
					
						<div class="change-pic">
							<h3>Change Profile Picture <small>ensure your picture is a square</small>
							</h3>
							<form method="POST" action="../src/settings/updateProfile.php" enctype="multipart/form-data">
								<label for="inputfile1" class="btn btn-primary btn-sm" role="button" id="buttonStyleicon"> <span class="glyphicon glyphicon-picture"aria-hidden="true"></span>
								</label> 
								<input name="image" type="file" id="inputfile1" style="display: none;" onchange="showUploaded('upload-description1','inputfile1');">
								<label id="upload-description1"></label>
								<div class="pull-right">
									<button type="submit" class="btn btn-primary" id="buttonStyle">Update</button>
								</div>
							</form>
							<hr />
							<h3>Change Cover Picture</h3>
							<form method="POST" action="../src/settings/updateCover.php" enctype="multipart/form-data">
								<label for="inputfile2" class="btn btn-primary btn-sm" role="button"
									id="buttonStyleicon"> <span class="glyphicon glyphicon-picture"
									aria-hidden="true"></span>
								</label> 
								<input name="image" type="file" id="inputfile2" style="display: none;" onchange="showUploaded('upload-description2','inputfile2');"> 
								<label id="upload-description2"></label>
								<div class="pull-right">
									<button type="submit"  class="btn btn-primary" id="buttonStyle">Update</button>
								</div>
							</form>
							<hr />
						</div>
						
						<div class="info">
							<h3>Change Security Info</h3>
							<form action="../src/settings/updateInfo.php" method="POST">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY"
										aria-describedby="basic-addon1" name="dob">
								</div>
								<div class="form-group">
									<input type="number" class="form-control" placeholder="Phone number" aria-describedby="basic-addon1" name="phone">
								</div>
								<div class="form-group">
									<select class="form-control" name="sex">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Prefer not to say">Prefer not to say</option>
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" name="nation">
										<option value="Afghanistan">Afghanistan</option>
										<option value="Albania">Albania</option>
										<option value="Algeria">Algeria</option>
										<option value="American Samoa">American Samoa</option>
										<option value="Andorra">Andorra</option>
										<option value="Angola">Angola</option>
										<option value="Anguilla">Anguilla</option>
										<option value="Antartica">Antarctica</option>
										<option value="Antigua and Barbuda">Antigua and Barbuda</option>
										<option value="Argentina">Argentina</option>
										<option value="Armenia">Armenia</option>
										<option value="Aruba">Aruba</option>
										<option value="Australia">Australia</option>
										<option value="Austria">Austria</option>
										<option value="Azerbaijan">Azerbaijan</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bahrain">Bahrain</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="Barbados">Barbados</option>
										<option value="Belarus">Belarus</option>
										<option value="Belgium">Belgium</option>
										<option value="Belize">Belize</option>
										<option value="Benin">Benin</option>
										<option value="Bermuda">Bermuda</option>
										<option value="Bhutan">Bhutan</option>
										<option value="Bolivia">Bolivia</option>
										<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
										<option value="Botswana">Botswana</option>
										<option value="Bouvet Island">Bouvet Island</option>
										<option value="Brazil">Brazil</option>
										<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
										<option value="Brunei Darussalam">Brunei Darussalam</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Burundi">Burundi</option>
										<option value="Cambodia">Cambodia</option>
										<option value="Cameroon">Cameroon</option>
										<option value="Canada">Canada</option>
										<option value="Cape Verde">Cape Verde</option>
										<option value="Cayman Islands">Cayman Islands</option>
										<option value="Central African Republic">Central African Republic</option>
										<option value="Chad">Chad</option>
										<option value="Chile">Chile</option>
										<option value="China">China</option>
										<option value="Christmas Island">Christmas Island</option>
										<option value="Cocos Islands">Cocos (Keeling) Islands</option>
										<option value="Colombia">Colombia</option>
										<option value="Comoros">Comoros</option>
										<option value="Congo">Congo</option>
										<option value="Congo">Congo, the Democratic Republic of the</option>
										<option value="Cook Islands">Cook Islands</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Cota D'Ivoire">Cote d'Ivoire</option>
										<option value="Croatia">Croatia (Hrvatska)</option>
										<option value="Cuba">Cuba</option>
										<option value="Cyprus">Cyprus</option>
										<option value="Czech Republic">Czech Republic</option>
										<option value="Denmark">Denmark</option>
										<option value="Djibouti">Djibouti</option>
										<option value="Dominica">Dominica</option>
										<option value="Dominican Republic">Dominican Republic</option>
										<option value="East Timor">East Timor</option>
										<option value="Ecuador">Ecuador</option>
										<option value="Egypt">Egypt</option>
										<option value="El Salvador">El Salvador</option>
										<option value="Equatorial Guinea">Equatorial Guinea</option>
										<option value="Eritrea">Eritrea</option>
										<option value="Estonia">Estonia</option>
										<option value="Ethiopia">Ethiopia</option>
										<option value="Falkland Islands">Falkland Islands (Malvinas)</option>
										<option value="Faroe Islands">Faroe Islands</option>
										<option value="Fiji">Fiji</option>
										<option value="Finland">Finland</option>
										<option value="France">France</option>
										<option value="France Metropolitan">France, Metropolitan</option>
										<option value="French Guiana">French Guiana</option>
										<option value="French Polynesia">French Polynesia</option>
										<option value="French Southern Territories">French Southern Territories</option>
										<option value="Gabon">Gabon</option>
										<option value="Gambia">Gambia</option>
										<option value="Georgia">Georgia</option>
										<option value="Germany">Germany</option>
										<option value="Ghana">Ghana</option>
										<option value="Gibraltar">Gibraltar</option>
										<option value="Greece">Greece</option>
										<option value="Greenland">Greenland</option>
										<option value="Grenada">Grenada</option>
										<option value="Guadeloupe">Guadeloupe</option>
										<option value="Guam">Guam</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guinea">Guinea</option>
										<option value="Guinea-Bissau">Guinea-Bissau</option>
										<option value="Guyana">Guyana</option>
										<option value="Haiti">Haiti</option>
										<option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
										<option value="Holy See">Holy See (Vatican City State)</option>
										<option value="Honduras">Honduras</option>
										<option value="Hong Kong">Hong Kong</option>
										<option value="Hungary">Hungary</option>
										<option value="Iceland">Iceland</option>
										<option value="India" selected>India</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Iran">Iran (Islamic Republic of)</option>
										<option value="Iraq">Iraq</option>
										<option value="Ireland">Ireland</option>
										<option value="Israel">Israel</option>
										<option value="Italy">Italy</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Japan">Japan</option>
										<option value="Jordan">Jordan</option>
										<option value="Kazakhstan">Kazakhstan</option>
										<option value="Kenya">Kenya</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
										<option value="Korea">Korea, Republic of</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Kyrgyzstan">Kyrgyzstan</option>
										<option value="Lao">Lao People's Democratic Republic</option>
										<option value="Latvia">Latvia</option>
										<option value="Lebanon">Lebanon</option>
										<option value="Lesotho">Lesotho</option>
										<option value="Liberia">Liberia</option>
										<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Lithuania">Lithuania</option>
										<option value="Luxembourg">Luxembourg</option>
										<option value="Macau">Macau</option>
										<option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Malawi">Malawi</option>
										<option value="Malaysia">Malaysia</option>
										<option value="Maldives">Maldives</option>
										<option value="Mali">Mali</option>
										<option value="Malta">Malta</option>
										<option value="Marshall Islands">Marshall Islands</option>
										<option value="Martinique">Martinique</option>
										<option value="Mauritania">Mauritania</option>
										<option value="Mauritius">Mauritius</option>
										<option value="Mayotte">Mayotte</option>
										<option value="Mexico">Mexico</option>
										<option value="Micronesia">Micronesia, Federated States of</option>
										<option value="Moldova">Moldova, Republic of</option>
										<option value="Monaco">Monaco</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Montserrat">Montserrat</option>
										<option value="Morocco">Morocco</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Myanmar">Myanmar</option>
										<option value="Namibia">Namibia</option>
										<option value="Nauru">Nauru</option>
										<option value="Nepal">Nepal</option>
										<option value="Netherlands">Netherlands</option>
										<option value="Netherlands Antilles">Netherlands Antilles</option>
										<option value="New Caledonia">New Caledonia</option>
										<option value="New Zealand">New Zealand</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Niger">Niger</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Niue">Niue</option>
										<option value="Norfolk Island">Norfolk Island</option>
										<option value="Northern Mariana Islands">Northern Mariana Islands</option>
										<option value="Norway">Norway</option>
										<option value="Oman">Oman</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Palau">Palau</option>
										<option value="Panama">Panama</option>
										<option value="Papua New Guinea">Papua New Guinea</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Peru">Peru</option>
										<option value="Philippines">Philippines</option>
										<option value="Pitcairn">Pitcairn</option>
										<option value="Poland">Poland</option>
										<option value="Portugal">Portugal</option>
										<option value="Puerto Rico">Puerto Rico</option>
										<option value="Qatar">Qatar</option>
										<option value="Reunion">Reunion</option>
										<option value="Romania">Romania</option>
										<option value="Russia">Russian Federation</option>
										<option value="Rwanda">Rwanda</option>
										<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
										<option value="Saint LUCIA">Saint LUCIA</option>
										<option value="Saint Vincent">Saint Vincent and the Grenadines</option>
										<option value="Samoa">Samoa</option>
										<option value="San Marino">San Marino</option>
										<option value="Sao Tome and Principe">Sao Tome and Principe</option>
										<option value="Saudi Arabia">Saudi Arabia</option>
										<option value="Senegal">Senegal</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sierra">Sierra Leone</option>
										<option value="Singapore">Singapore</option>
										<option value="Slovakia">Slovakia (Slovak Republic)</option>
										<option value="Slovenia">Slovenia</option>
										<option value="Solomon Islands">Solomon Islands</option>
										<option value="Somalia">Somalia</option>
										<option value="South Africa">South Africa</option>
										<option value="South Georgia">South Georgia and the South Sandwich Islands</option>
										<option value="Span">Spain</option>
										<option value="SriLanka">Sri Lanka</option>
										<option value="St. Helena">St. Helena</option>
										<option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
										<option value="Sudan">Sudan</option>
										<option value="Suriname">Suriname</option>
										<option value="Svalbard">Svalbard and Jan Mayen Islands</option>
										<option value="Swaziland">Swaziland</option>
										<option value="Sweden">Sweden</option>
										<option value="Switzerland">Switzerland</option>
										<option value="Syria">Syrian Arab Republic</option>
										<option value="Taiwan">Taiwan, Province of China</option>
										<option value="Tajikistan">Tajikistan</option>
										<option value="Tanzania">Tanzania, United Republic of</option>
										<option value="Thailand">Thailand</option>
										<option value="Togo">Togo</option>
										<option value="Tokelau">Tokelau</option>
										<option value="Tonga">Tonga</option>
										<option value="Trinidad and Tobago">Trinidad and Tobago</option>
										<option value="Tunisia">Tunisia</option>
										<option value="Turkey">Turkey</option>
										<option value="Turkmenistan">Turkmenistan</option>
										<option value="Turks and Caicos">Turks and Caicos Islands</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Uganda">Uganda</option>
										<option value="Ukraine">Ukraine</option>
										<option value="United Arab Emirates">United Arab Emirates</option>
										<option value="United Kingdom">United Kingdom</option>
										<option value="United States">United States</option>
										<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Uzbekistan">Uzbekistan</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Venezuela">Venezuela</option>
										<option value="Vietnam">Viet Nam</option>
										<option value="Virgin Islands (British)">Virgin Islands (British)</option>
										<option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
										<option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
										<option value="Western Sahara">Western Sahara</option>
										<option value="Yemen">Yemen</option>
										<option value="Yugoslavia">Yugoslavia</option>
										<option value="Zambia">Zambia</option>
										<option value="Zimbabwe">Zimbabwe</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Hobbies" aria-describedby="basic-addon1" name="hobbies">
								</div>
								<div class="form-group">
									<button type="submit" id="buttonStyle" class="form-control btn btn-primary">Update Info</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			
		</div>	
	</div>

	<div style="padding-left: 0px;" class="col-xs-2 col-xs-offset-1 col-sm-2 col-sm-offset-1 col-md-2 col-md-offset-1 col-lg-2 col-lg-offset-1">
		<div class="sidebar-nav-fixed pull-right affix">
			<?php include "php/chat.php"; ?>
		</div>
	</div>


		<script>
			 $(function() {
				$( "#live-search-box" ).autocomplete({
				   source: "<?php echo $root;?>php/liveSearch.php"
				});
			 });

				 $(document).ready(function() {
					 generateChatHistory();
				 toastr.options = {
				 "closeButton": true,
				 "debug": false,
				 "newestOnTop": false,
				 "progressBar": false,
				 "positionClass": "toast-bottom-left",
				 "preventDuplicates": true,
				 "onclick": null,
				 "showDuration": "300",
				 "hideDuration": "1000",
				 "timeOut": "5000",
				 "extendedTimeOut": "1000",
				 "showEasing": "swing",
				 "hideEasing": "linear",
				 "showMethod": "fadeIn",
				 "hideMethod": "fadeOut"
			 }
		 });
		 var pusher = new Pusher('39709b3d935be0f19bb0');

		 var notificationsChannel = pusher.subscribe('notification-<?php echo $_SESSION['user']['id'];?>');

		 notificationsChannel.bind('comment', function(comment) {
			 var message = comment.message;
			 toastr.info(message);
			 var v=document.getElementById("notification-bell");
			 var number=Number(v.innerHTML);
			 v.innerHTML=String(++number);
		 });
		 notificationsChannel.bind('message', function(message) {
			 var msg = emojione.unicodeToImage(message.msg);
			 var convid = message.convid;
			 var from = message.from;
			 if(document.getElementById("messaging-"+convid).className.includes("toggle")){
				//chat window open do somthing
				var resp="<div class='chat-messages receivermsg one'>"+msg+"</div>";
				document.getElementById("previouschats"+convid).innerHTML += resp;
				scrollToBottom(convid);
			 }
			 else{
				 //chat window closed
				 var i=document.getElementById("conversation-badge-"+convid).innerHTML||0;
				 i++;
				 document.getElementById("conversation-badge-"+convid).innerHTML=i;
			 }
		 });
		 
     notificationsChannel.bind('comment', function(comment) {
         var message = comment.message;
         toastr.info(message);
         var v=document.getElementById("notification-bell");
         var number=Number(v.innerHTML);
         v.innerHTML=String(++number);
     });
     notificationsChannel.bind('message', function(message) {
         var msg = emojione.unicodeToImage(message.msg);
         var convid = message.convid;
		 var from = message.from;
		 if(document.getElementById("messaging-"+convid).className.includes("toggle")){
			//chat window open do somthing
			var resp="<div class='chat-messages receivermsg one'>"+msg+"</div>";
			document.getElementById("previouschats"+convid).innerHTML += resp;
			scrollToBottom(convid);
		 }
		 else{
			 //chat window closed
			 var i=document.getElementById("conversation-badge-"+convid).innerHTML||0;
			 i++;
			 document.getElementById("conversation-badge-"+convid).innerHTML=i;
		 }
     });
     notificationsChannel.bind('follow', function(follow) {
         var message = follow.message;
         toastr.info(message);
         var v=document.getElementById("notification-bell");
         var number=Number(v.innerHTML);
         v.innerHTML=String(++number);
     });
      </script>
</body>
</html>
