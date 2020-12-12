//action listeners for bulk upload and insert a student....
document.getElementsByClassName("bulk").addEventListener("click",display_bulk_upload);
//document.querySelector("input.bulk").addEventListener("click",display_bulk_upload);
document.querySelector(".add_student").addEventListener("click",display_add_student);
//document.querySelector("div.upload_students1 input.add_student").addEventListener("click",display_add_student);

function display_bulk_upload() {
	document.querySelector("div.upload_students").style.display="block";
	document.querySelector("div.upload_students1").style.display="none";
}
function display_add_student() {
	// body...
	document.querySelector("div.upload_students1").style.display="block";
	document.querySelector("div.upload_students").style.display="none";
}

//action listener to check credentials before inserting into DB
document.querySelector("div.upload_students1 input.add_student").addEventListener("click",check_before_stud_insert);
function check_before_stud_insert()
{
	var name=document.querySelector("#stud_name").value;
	var roll_no=document.getElementById("stud_roll").value;
	var class1=document.querySelector("#class_fetch").value;
	var email=document.querySelector("#stud_email").value;
	var pass=document.getElementById("pswd").value;
	var confirmpswd=document.querySelector("#confirmpswd").value;
	var gender=document.querySelector("#gender_of_stud").value;
	if(name=="")
	{
		document.querySelector("#stud_name1").innerHTML="** Name field cannot be blank!";
		return false;
	}
	else if(name.length<=2 && name.length>30)
	{
		document.querySelector("#stud_name1").innerHTML="** Name should of minimum 3 characters";
		return false;
	}
	else if(!isNaN(name))
	{
		document.querySelector("#stud_name1").innerHTML="** Name should only contain alphabets!";
		return false;
	}
	if(isNaN(roll_no))
	{
		document.querySelector("#stud_roll1").innerHTML="** Roll number should only contain digits!";
		return false;
	}
	if((email.indexOf('@'))<=0)
	{
		document.querySelector("#stud_email1").innerHTML="** Please enter a valid email Id!";
	}
	else if(!(email.length-4==email.indexOf('.')) && !(email.length-3==email.indexOf('.')))
	{
		document.querySelector("#student").innerHTML="** Please enter the correct domain of your email!";
	}
	if(pass=="")
	{
		document.querySelector("#pswd1").innerHTML="** Password field cannot be blank!";
	}
	if(pass!=confirmpswd)
	{
		document.querySelector("#confirmpswd1").innerHTML="** The Password field and confirm Password doesn't match!";
	}
	if(gender=="")
	{
		document.querySelector("#gender_of_stud1").innerHTML="** Gender field is required!";
	}
	$.ajax({
		url:"add_class.php",
		method: "post",
	})
}
