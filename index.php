<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vue Js Crud System</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="app_div">

        <div class="user">
          <h1>All Users</h1>
          <button class="btn">Add New</button>
          <br>
          <table border="1px solid black">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Faisal Tamim</td>
                <td>mdf41401@gmail.com</td>
                <td>faisal12345678</td>
              </tr>
            </tbody>
          </table>
        </div>




    </div>
    <script src="js/axios.min.js"></script>
    <script src="js/vue.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
