<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vue Js Crud System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="app_div">

        <div class="user">
          <h1>All Users</h1>
          <button class="btn btn-primary" @click="userModal=true">Add New</button>
          <br>
          <table border="1px solid black">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in vueUsers">
                <td>{{user.id}}</td>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>{{user.password}}</td>
                <td>
                  <button class="btn btn-primary" @click="userModaledit=true;addEdituser(user)">Edit</button> | <button class="btn btn-danger" v-on:click="deleteData(user.id)">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- Success & error msg -->
          <div class="msg">
            <span class="success" v-if="successMsg">{{successMsg}} <button @click="HideClick">X</button> </span>
            <span class="error" v-if="errorMsg">{{errorMsg}} <button @click="HideClick">X</button> </span>
          </div>




        </div>



      <!-- add user modal -->
      <div class="formModal" v-if="userModal">
        <div class="modalContent">
          <div class="fheader">
            <div class="title">
                Add New User
            </div>
            <div class="closeBtn">
                <button class="Modalbtn" @click="userModal=false">X</button>
            </div>
        </div>
        <div class="fbody">
            <form>
                <table>
                  <div class="nameGrp">
                    <tr>
                      <th><label for="name">Name</label></th>
                      <td><input id="name" v-model="form.name" type="text"></td>
                    </tr>
                  </div>
                  <div class="emailGrp">
                   <tr>
                      <th><label for="email">Email</label></th>
                      <td><input id="email" v-model="form.email" type="text"></td>
                    </tr>
                  </div>
                  <div class="passGrp">
                    <tr>
                      <th><label for="pass">Password </label></th>
                      <td><input id="pass" v-model="form.password" type="text"></td>
                    </tr>
                  </div>
                  <div class="submitGrp">
                    <tr>
                      <th><input id="adduserbtn" type="submit" value="Add User"  @click="userModal=false; addnewUser();"></th>
                      <td></td>
                    </tr>
                  </div>
                </table>
            </form>
        </div>
        </div>
      </div>
      <!-- add user modal end -->

      <!-- edit user modal -->
      <div class="formModal" v-if="userModaledit">
        <div class="modalContent">
          <div class="fheader">
            <div class="title">
                Edit & Update User
            </div>
            <div class="closeBtn">
                <button class="Modalbtn" @click="userModaledit=false">X</button>
            </div>
        </div>
        <div class="fbody">
            <form>
                <table>
                  <div class="nameGrp">
                    <tr>
                      <th><label for="name">Name</label></th>
                      <td><input id="name" v-model="edit.name" type="text"></td>
                    </tr>
                  </div>
                  <div class="emailGrp">
                   <tr>
                      <th><label for="email">Email</label></th>
                      <td><input id="email" v-model="edit.email" type="text"></td>
                    </tr>
                  </div>
                  <div class="passGrp">
                    <tr>
                      <th><label for="pass">Password </label></th>
                      <td><input id="pass" v-model="edit.password" type="text"></td>
                    </tr>
                  </div>
                  <div class="submitGrp">
                    <tr>
                      <th><input id="adduserbtn" type="submit" value="Update User"  @click="userModaledit=false;updateUser();"></th>
                      <td></td>
                    </tr>
                  </div>
                </table>
            </form>
        </div>
        </div>
      </div>
      <!-- edit user modal end -->


    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="js/vue.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
