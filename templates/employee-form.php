<div class="container" id="hide_add_form">
  <h2>Employee Form</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="first_name" name="fname" placeholder="Enter First Name..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="last_name" name="lastname" placeholder="Enter Last Name..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">Joining Date</label>
      </div>
      <div class="col-75">
        <input type="date" id="jdate" name="jdate" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">E-mail</label>
      </div>
      <div class="col-75">
        <input type="email" id="email" name="email" placeholder="Enter Email..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="image">Profile Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="image" name="image" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="mobile">Mobile Number</label>
      </div>
      <div class="col-75">
        <input type="tel" id="mobile" name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter mobile number"required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Designation">Choose a Designation</label>
      </div>
      <div class="col-75">
      <select name="designation" id="designation">
        <option value="—">-- Select --</option>
        <option value="Account Manager">Account Manager</option>
        <option value="Manager">Manager</option>
        <option value="HR">HR</option>
        <option value="Developer">Software Developer</option>
        <option value="SQA">SQA</option>
        <option value="Content Writer">Content Writer</option>
       
      </select>
      </div>
      
    </div>
    <div class="row" id="skills">
      <div class="col-25">
        <label for="skill">Skills</label>
      </div>
      <div class="col-75">
        <select name="skills[]" id="multiple_select_skill" multiple="multiple" required>
          <option value="Documentation">Documentation</option>
          <option value="Front-end Designer">Front-end Designer</option>
          <option value="OOP">OOP</option>
          <option value="JavaScript">JavaScript</option>
          <option value="Database">Database</option>
          <option value="Python">Python</option>
          <option value="PHP">PHP</option>
          <option value="Java">Java</option>
          <option value="C#">C#</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="gender">Gender</label>
      </div>
      <div class="col-75">
        <input type="radio" id="gender" name="gender" checked value="male">Male
        <input type="radio" id="gender" name="gender" value="female">female
      </div>
    </div>
    <div class="row">
      <div class="col-25">
      </div>
      <div class="col-75">
        <input type="checkbox" id="agree" value="agree" name="agree" style="margin:9px;"><b><label for="agree">Agree with Terms and Conditions</label></b>
      </div>
    </div>
    <div class="row">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</div>





</body>
</html>

