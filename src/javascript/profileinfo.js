function validate(formObj) {

   

    var finalAlert = "";
    var setFocus = 0;

    if (formObj.name.value == "") {
      finalAlert += "-You must enter a name\n";
      if (setFocus === 0) {
         formObj.name.focus();
         setFocus = 1;
      }
   }
 
    if (formObj.location.value == "") {
       finalAlert += "-You must enter a location\n";
       if (setFocus === 0) {
          formObj.location.focus();
          setFocus = 1;
       }
    }
 
    if (formObj.email.value == "") {
       finalAlert += "-You must enter an email\n";
       if (setFocus === 0) {
          formObj.email.focus();
          setFocus = 1;
       }
    }

    if (formObj.phone.value == "") {
      finalAlert += "-You must enter a phone number\n";
      if (setFocus === 0) {
         formObj.phone.focus();
         setFocus = 1;
      }
   }
 
    if (formObj.obj.value == "") {
       finalAlert += "-You must enter an objective statement\n";
       if (setFocus === 0) {
          formObj.obj.focus();
          setFocus = 1;
       }
    }

    if (formObj.rpidates.value == "") {
      finalAlert += "-You must enter dates enrolled at RPI\n";
      if (setFocus === 0) {
         formObj.rpidates.focus();
         setFocus = 1;
      }
   }

   if (formObj.major.value == "") {
      finalAlert += "-You must enter a major\n";
      if (setFocus === 0) {
         formObj.major.focus();
         setFocus = 1;
      }
   }

   if (formObj.gpa.value == "") {
      finalAlert += "-You must enter a GPA\n";
      if (setFocus === 0) {
         formObj.gpa.focus();
         setFocus = 1;
      }
   }

    if (formObj.accomplishments.value == "") {
       finalAlert += "-You must enter accomplishments (clubs, awards, etc.); Ex: Dean's List, Robotics Club Member\n";
       if (setFocus === 0) {
          formObj.accomplishments.focus();
          setFocus = 1;
       }
    }
 
    if (formObj.hsname.value == "") {
       finalAlert += "-You must enter a high school name\n";
       if (setFocus === 0) {
          formObj.hsname.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.hsdates.value == "")) {
       finalAlert += "-You must enter high school enrollment dates; Ex: (2018-2022)\n";
       if (setFocus === 0) {
          formObj.hsdates.focus();
          setFocus = 1;
       }
    }

    if ((formObj.hsgpa.value == "")) {
      finalAlert += "-You must enter a high school GPA\n";
      if (setFocus === 0) {
         formObj.hsgpa.focus();
         setFocus = 1;
      }
   }

    if ((formObj.hsaccomplishments.value == "")) {
       finalAlert += "-You must enter high school accomplishments (clubs, awards, etc.); Ex: Varsity Soccer, Latin Club President\n";
       if (setFocus === 0) {
          formObj.hsaccomplishments.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job1name.value == "")) {
       finalAlert += "-You must enter a Company Name for Job 1\n";
       if (setFocus === 0) {
          formObj.job1name.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job1title.value == "")) {
       finalAlert += "-You must enter a Position Title for Job 1\n";
       if (setFocus === 0) {
          formObj.job1title.focus();
          setFocus = 1;
       }
    }

    if ((formObj.job1location.value == "")) {
      finalAlert += "-You must enter a location for Job 1\n";
      if (setFocus === 0) {
         formObj.job1location.focus();
         setFocus = 1;
      }
   }
 
    if ((formObj.job1dates.value == "")) {
       finalAlert += "-You must enter Employment Dates for Job 1; Ex: (May 2022-February 2023)\n";
       if (setFocus === 0) {
          formObj.job1dates.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job1description1.value == "")) {
       finalAlert += "-You must enter a Description 1 for Job 1\n";
       if (setFocus === 0) {
          formObj.job1description1.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job1description2.value == "")) {
       finalAlert += "-You must enter a Description 2 for Job 1\n";
       if (setFocus === 0) {
          formObj.job1description2.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job2name.value == "")) {
       finalAlert += "-You must enter a Company Name for Job 2\n";
       if (setFocus === 0) {
          formObj.job2name.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job2title.value == "")) {
       finalAlert += "-You must enter a Position Title for Job 2\n";
       if (setFocus === 0) {
          formObj.job2title.focus();
          setFocus = 1;
       }
    }

    if ((formObj.job2location.value == "")) {
      finalAlert += "-You must enter a location for Job 2\n";
      if (setFocus === 0) {
         formObj.job2location.focus();
         setFocus = 1;
      }
   }
 
    if ((formObj.job2dates.value == "")) {
       finalAlert += "-You must enter Employment Dates for Job 2; Ex: (May 2022-February 2023)\n";
       if (setFocus === 0) {
          formObj.job2dates.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job2description1.value == "")) {
       finalAlert += "-You must enter a Description 1 for Job 2\n";
       if (setFocus === 0) {
          formObj.job2des1.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job2description2.value == "")) {
       finalAlert += "-You must enter a Description 2 for Job 2\n";
       if (setFocus === 0) {
          formObj.job2des2.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job3name.value == "")) {
       finalAlert += "-You must enter a Company Name for Job 3\n";
       if (setFocus === 0) {
          formObj.job3name.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job3title.value == "")) {
       finalAlert += "-You must enter a Position Title for Job 3\n";
       if (setFocus === 0) {
          formObj.job3title.focus();
          setFocus = 1;
       }
    }

    if ((formObj.job3location.value == "")) {
      finalAlert += "-You must enter a location for Job 3\n";
      if (setFocus === 0) {
         formObj.job3location.focus();
         setFocus = 1;
      }
   }
 
    if ((formObj.job3dates.value == "")) {
       finalAlert += "-You must enter Employment Dates for Job 3; Ex: (May 2022-February 2023)\n";
       if (setFocus === 0) {
          formObj.job3dates.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job3description1.value == "")) {
       finalAlert += "-You must enter a Description 1 for Job 3\n";
       if (setFocus === 0) {
          formObj.job3description1.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.job3description2.value == "")) {
       finalAlert += "-You must enter a Description 2 for Job 3\n";
       if (setFocus === 0) {
          formObj.job3description2.focus();
          setFocus = 1;
       }
    }

    if ((formObj.project1name.value == "")) {
      finalAlert += "-You must enter a name for Project 1\n";
      if (setFocus === 0) {
         formObj.project1name.focus();
         setFocus = 1;
      }
   }

   if ((formObj.project1dates.value == "")) {
      finalAlert += "-You must enter dates for Project 1 Ex: (May 2021 - June 2021)\n";
      if (setFocus === 0) {
         formObj.project1dates.focus();
         setFocus = 1;
      }
   }

   if ((formObj.project1description.value == "")) {
      finalAlert += "-You must enter a description for Project 1\n";
      if (setFocus === 0) {
         formObj.project1description.focus();
         setFocus = 1;
      }
   }

   if ((formObj.project2name.value == "")) {
      finalAlert += "-You must enter a name for Project 2\n";
      if (setFocus === 0) {
         formObj.project2name.focus();
         setFocus = 1;
      }
   }

   if ((formObj.project2dates.value == "")) {
      finalAlert += "-You must enter dates for Project 2 Ex: (May 2021 - June 2021)\n";
      if (setFocus === 0) {
         formObj.project2dates.focus();
         setFocus = 1;
      }
   }

   if ((formObj.project2description.value == "")) {
      finalAlert += "-You must enter a description for Project 2\n";
      if (setFocus === 0) {
         formObj.project2description.focus();
         setFocus = 1;
      }
   }

 
    if ((formObj.hardskill1.value == "")) {
       finalAlert += "-You must enter a first Hard Skill\n";
       if (setFocus === 0) {
          formObj.hardskill1.focus();
          setFocus = 1;
       }
    }

    if ((formObj.hardskill2.value == "")) {
      finalAlert += "-You must enter a second Hard Skill\n";
      if (setFocus === 0) {
         formObj.hardskill2.focus();
         setFocus = 1;
      }
   }
 
    if ((formObj.softskill1.value == "")) {
       finalAlert += "-You must enter a first Soft Skill\n";
       if (setFocus === 0) {
          formObj.softskill1.focus();
          setFocus = 1;
       }
    }
 
    if ((formObj.softskill2.value == "")) {
       finalAlert += "-You must enter a second Soft Skill\n";
       if (setFocus === 0) {
          formObj.softskill2.focus();
          setFocus = 1;
       }
    }
 
    if (finalAlert === "") {
       return true;
    } else {
       alert(finalAlert);
       return false;
    }
}