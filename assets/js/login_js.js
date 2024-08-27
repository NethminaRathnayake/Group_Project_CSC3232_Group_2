const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".containe");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

function signup() {
 
 
  var reg_no = document.getElementById("reg_no");
  var name = document.getElementById("name");
  var email = document.getElementById("email");
  var contact = document.getElementById("contact");
  var password = document.getElementById("password");
  var cm_password = document.getElementById("cm_password");
  var address = document.getElementById("address");
  var faculty = document.getElementById("faculty");
  var department = document.getElementById("department");
  var level = document.getElementById("level");



  var f = new FormData();
  f.append("reg_no", reg_no.value);
  f.append("name", name.value);
  f.append("email", email.value);
  f.append("contact", contact.value);
  f.append("password", password.value);
  f.append("cm_password", cm_password.value);
  f.append("address", address.value);
  f.append("faculty", faculty.value);
  f.append("department", department.value);
  f.append("level", level.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;
          if (text == "success") {
             
            window.location="index.php";
           
          } else {
            alert(text);
          }

      }

  }
  r.open("POST", "signUpProcess.php", true);
  r.send(f);

}


function login(){

  var reg_no =document.getElementById("lg_reg_no");
  var password = document.getElementById("lg_password");
  var remember = document.getElementById("remember");

  // alert(remember.checked);
  //  alert(reg_no.value);
  //   alert(password.value);
  var f = new FormData();
  f.append("reg_no", reg_no.value);
  f.append("password", password.value);
  f.append("remember", remember.checked);
  
  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;
          if (text == "student") {
      
            window.location = "home.php";

          } else if(text == "admin") {

            window.location = "admin.php";
             
          }else{
            alert(text);
          }
          // alert(text);

      }

  }
  r.open("POST", "LoginProcess.php", true);
  r.send(f);

}
var bm;

function forgotPassword() {


  var m = document.getElementById("forgetPasswordModal");
  bm = new bootstrap.Modal(m);
  bm.show();
  
}
function sendemail(){
  var m = document.getElementById("forgetPasswordModal");
  bm = new bootstrap.Modal(m);
  bm.close();

  var email = document.getElementById("forgetEmail")

  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;

          if (text == "success") {
            bm.close();
              alert("Email varification sent. Please check your inbox.");

          } else {
              alert(text);
          }
      }
  };
  r.open("GET", "forgotPasswordprocess.php?e=" + email.value, true);
  r.send();


}

// function changeView() {

//   var signInBox = document.getElementById("signInBox");
//   var signUpBox = document.getElementById("signUpBox");

//   signInBox.classList.toggle("d-none");
//   signUpBox.classList.toggle("d-none");

// }
function tableload(){


  var student_id = document.getElementById("student_id").value;
  var cource_name = document.getElementById("cource_name").value;
  var date_from = document.getElementById("date_from").value;
  var date_to = document.getElementById("date_to").value;

  var viewProduct = document.getElementById("viewattendance");


  // if( subject_name == ""){

  // }else{

  // }

  var f = new FormData();
  f.append("student_id", student_id);
  f.append("cources_name", cource_name);
  f.append("date_from", date_from);
  f.append("date_to", date_to);



  var r = new XMLHttpRequest();

  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var t = r.responseText;
          viewProduct.innerHTML = t;
          // alert(t)
      }
  }

  r.open("POST", "searchAttendance.php", true);
  r.send(f);
}
// setInterval(tableload(), 100);

function logout(){
  var r = new XMLHttpRequest();

  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var t = r.responseText;
         if(t=="success"){
          window.location = "index.php";
         }
          
      }
  }

  r.open("POST", "logutProcess.php", true);
  r.send();
}
function adminStudentRegistration(){
  
 
 
  var reg_no = document.getElementById("reg_no");
  var name = document.getElementById("name");
  var email = document.getElementById("email");
  var contact = document.getElementById("contact");
  var password = document.getElementById("password");
  var cm_password = document.getElementById("cm_password");
  var address = document.getElementById("address");
  var faculty = document.getElementById("faculty");
  var department = document.getElementById("department");
  var level = document.getElementById("level");



  var f = new FormData();
  f.append("reg_no", reg_no.value);
  f.append("name", name.value);
  f.append("email", email.value);
  f.append("contact", contact.value);
  f.append("password", password.value);
  f.append("cm_password", cm_password.value);
  f.append("address", address.value);
  f.append("faculty", faculty.value);
  f.append("department", department.value);
  f.append("level", level.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;
          if (text == "success") {
             
            alert("student Register Success");
            window.location.reload();
          } else {
            alert(text);
          }

      }

  }
  r.open("POST", "signUpProcess.php", true);
  r.send(f);
}
function adminTeacherRegistration(){
  var t_id = document.getElementById("t_id");
  var t_name = document.getElementById("t_name");
  var t_password = document.getElementById("t_password");
  var t_cm_password = document.getElementById("t_cm_password");


  var f = new FormData();
  f.append("t_id", t_id.value);
  f.append("t_name", t_name.value);
  f.append("t_password", t_password.value);
  f.append("t_cm_password", t_cm_password.value);

  
  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;
          if (text == "success") {
             
            alert("Teacher Registered Success");

            // loadTeachers();

            window.location.reload();
             
            t_id.value = "";
            t_name.value = "";
            t_password.value = "";
            t_cm_password.value = "";

           
          
          
          } else {
            alert(text);
          }

      }

  }
  r.open("POST", "Teacher_registration_process.php", true);
  r.send(f);
}
function loadTeachers(){
  var t_search_id = document.getElementById("t_id").value;
  var t_search_text = document.getElementById("t_search").value;

  var t_view = document.getElementById("View_teachers");
  
  var f = new FormData();
  f.append("t_search_id", t_search_id);
  f.append("t_search_text", t_search_text);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;
          t_view.innerHTML = text;

      }

  }
  r.open("POST", "Teacher_register_load_process.php", true);
  r.send(f);
}
function adminFacultyRegistration(){
  var f_id = document.getElementById("f_id");
  var f_name = document.getElementById("f_name");

  var t_view = document.getElementById("View_faculty");
  
  var f = new FormData();
  f.append("f_id", f_id.value);
  f.append("f_name", f_name.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;
         if( text == "success"){

          // loadFaculty();
          window.location.reload();

          f_id.value = "";
          f_name.value = "";

         }else{
          alert(text);
         }

      }

  }
  r.open("POST", "Faculty_registration_process.php", true);
  r.send(f);
}
function loadFaculty(){

  var f_id = document.getElementById("f_id").value;
  var f_name = document.getElementById("f_name").value;
   var View_faculty = document.getElementById("View_faculty");
  
  var f = new FormData();
  f.append("f_id", f_id);


  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;
          View_faculty.innerHTML = text;

      }

  }
  r.open("POST", "Faculty_register_load_process.php", true);
  r.send(f);
}

function  adminDepartmentRegistration(){

  var D_faculty = document.getElementById("D_faculty");
  var D_id = document.getElementById("D_id");
  var D_name = document.getElementById("D_name");

  var D_view = document.getElementById("View_Department");
  
  var f = new FormData();
  f.append("D_faculty", D_faculty.value);
  f.append("D_id", D_id.value);
  f.append("D_name", D_name.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;
         if( text == "success"){

          // loadDepartment();
          alert("Department Registration Success");
          window.location.reload();
        
          D_id.value = "";
          D_name.value = "";
          
         }else{
          alert(text);
         }

      }

  }
  r.open("POST", "Department_registration_process.php", true);
  r.send(f);
  
}
function loadDepartment(){
 
  var D_faculty = document.getElementById("D_faculty");
  var D_id = document.getElementById("D_id");

   var View_Department = document.getElementById("View_Department");
  
  var f = new FormData();
  f.append("D_faculty", D_faculty.value);
  f.append("D_id", D_id.value);


  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;
         View_Department.innerHTML = text;

      }

  }
  r.open("POST", "Department_register_load_process.php", true);
  r.send(f);
}
function adminCourseRegistration(){

  var C_id = document.getElementById("C_id");
  var C_name = document.getElementById("C_name");
  var C_credit = document.getElementById("C_credit");
  
  var f = new FormData();
  f.append("C_id", C_id.value);
  f.append("C_name", C_name.value);
  f.append("C_credit", C_credit.value);


  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;

          if(text == "success"){

            // loadCourse();

            alert(text);
            C_id.value ="";
            C_name.value = "";
            C_credit.value ="";

            window.location.reload();

          }else{
            alert(text);
          }

      }

  }
  r.open("POST", "Course_registration_process.php", true);
  r.send(f);


}

function loadCourse(){
  
  var C_id = document.getElementById("C_id");

  
  var View_Course = document.getElementById("View_Course");
  
  var f = new FormData();
  f.append("C_id", C_id.value);


  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;
          View_Course.innerHTML = text;

      }

  }
  r.open("POST", "Course_register_load_process.php", true);
  r.send(f);
  }

  function adminSubjectRegistration(){

  

    var S_faculty = document.getElementById("S_faculty");
    var S_Department = document.getElementById("S_Department");
    
    var S_Course = document.getElementById("S_Course");
    var S_Level = document.getElementById("S_Level");
    var S_Id = document.getElementById("S_Id");
    var S_Name = document.getElementById("S_Name");
    var S_Hours = document.getElementById("S_Hours"); 
    var S_Credit = document.getElementById("S_Credit");


    
  var f = new FormData();
  f.append("S_faculty", S_faculty.value);
  f.append("S_Department", S_Department.value);
  f.append("S_Course", S_Course.value);
  f.append("S_Level", S_Level.value);
  f.append("S_Id", S_Id.value);
  f.append("S_Name", S_Name.value);
  f.append("S_Hours", S_Hours.value);
  f.append("S_Credit", S_Credit.value);


  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;

          if(text == "success"){

            // loadSubjects();
            window.location.reload();

            alert(text);
            S_Id.value ="";
            S_Name.value = "";
            S_Hours.value ="";
            S_Credit.value ="";

          }else{
            alert(text);
          }

      }

  }
  r.open("POST", "Subject_registration_process.php", true);
  r.send(f);
  }
  function loadSubjects(){
   
    var S_faculty = document.getElementById("S_faculty");
    var S_Department = document.getElementById("S_Department");
    var S_Course = document.getElementById("S_Course");
    var S_Level = document.getElementById("S_Level");
    var S_Id = document.getElementById("S_Id");


    var f = new FormData();
    f.append("S_faculty", S_faculty.value);
    f.append("S_Department", S_Department.value);
    f.append("S_Course", S_Course.value);
    f.append("S_Level", S_Level.value);
    f.append("S_Id", S_Id.value);

    var View_subjects = document.getElementById("View_subjects");

  
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text)
            View_subjects.innerHTML = text;
  
        }
  
    }
    r.open("POST", "Subject_register_load_process.php", true);
    r.send(f);
    }



var get_classSheduleId;
function getClassSheduleId(id){
  get_classSheduleId = id;
  alert("Shedule Selected Success");
}



function loadStudents(){
  var stuSchId = document.getElementById("stuShedule");

  var st_view = document.getElementById("stScheduId");
  
  var f = new FormData();
  f.append("std_search", stuSchId.value);
  f.append("get_classSheduleId",get_classSheduleId);


  var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
      if (r.readyState == 4) {
          var text = r.responseText;
          // alert(text);
          st_view.innerHTML = text;

      }

  }
  r.open("POST", "student_register_load_process.php", true);
  r.send(f);
}


function markAttendence(id){
  // alert(id);
  // alert(get_classSheduleId);

  var attenId = id;

  var f  = new FormData();
  f.append("attnId",attenId);
  f.append("get_classSheduleId",get_classSheduleId);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){
    if (request.readyState == 4 && request.status == 200) {
         var response = request.responseText;
         alert("Attendence Mark Success");
         
         document.getElementById("stuShedule").value = attenId;
         loadStudents();
    }
  };

  request.open("POST","studentAttendenceMarkProccess.php",true);
  request.send(f);
}


function adminClassShedule(){
  var course = document.getElementById("S_Course");
  var level = document.getElementById("S_Level");
  var subject = document.getElementById("S_subject");
  var date = document.getElementById("date");
  var timeFrom = document.getElementById("t_From");
  var timeTo = document.getElementById("t_To");
  var hours = document.getElementById("hours");

  var f = new FormData();
  f.append("course",course.value);
  f.append("level",level.value);
  f.append("subject",subject.value);
  f.append("date",date.value);
  f.append("timeFrom",timeFrom.value);
  f.append("timeTo",timeTo.value);
  f.append("hours",hours.value);
  
 
  var request = new XMLHttpRequest();
  request.onreadystatechange  = function(){
    if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        if (response == "Success") {
          
          course.value = 0;
          level.value = 0;
          date.value = "";
          timeFrom.value = "";
          timeTo.value = "";
          hours.value = "";
          subject.value = 0;
          alert("Class Sheduled Completed");

        }else{
          alert(response);
        }
    }
  };

  request.open("POST","adminClassSheduleProcess.php",true);
  request.send(f);

}


