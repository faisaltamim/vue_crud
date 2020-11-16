let app = new Vue({
  el: ".app_div",
  data: {
    vueUsers: [],

    form: {
      name: null,
      email: null,
      password: null,
    },
    edit: {},
    userModal: false,
    userModaledit: false,
    errorMsg: null,
    successMsg: null,
  },
  methods: {
    getData: function () {
      axios
        .get("http://localhost/Laravel_Vue/vue_crud/api.php?action=read")
        .then(function (myResponse) {
          if (!myResponse.data.error) {
            app.vueUsers = myResponse.data.users;
          } else {
            app.errorMsg = myResponse.data.errormsg;
          }
        });
    },

    //add new data
    addnewUser: function () {
      let formData = this.MyFormData(this.form);

      //axios data conver in json

      axios
        .post(
          "http://localhost/Laravel_Vue/vue_crud/api.php?action=create",
          formData
        )
        .then(function (response) {
          if (!response.data.error) {
            app.getData();
            app.form.name = "";
            app.form.email = "";
            app.form.password = "";
            app.errorMsg = null;
            app.successMsg = response.data.message;
          } else {
            app.successMsg = null;
            app.errorMsg = response.data.message;
          }
        });
    },

    //data send in database
    MyFormData: function (recieveData) {
      let data = new FormData();
      for (let key in recieveData) {
        data.append(key, recieveData[key]);
      }
      return data;
    },

    //error msg click hide function
    HideClick: function () {
      this.errorMsg = null;
      this.successMsg = null;
    },

    //data delete
    deleteData: function (id) {
      let formData = this.MyFormData({ id: id });

      //axios data conver in json

      axios
        .post(
          "http://localhost/Laravel_Vue/vue_crud/api.php?action=delete",
          formData
        )
        .then(function (response) {
          if (!response.data.error) {
            app.getData();
            app.form.name = "";
            app.form.email = "";
            app.form.password = "";
            app.errorMsg = null;
            app.successMsg = response.data.message;
          } else {
            app.successMsg = null;
            app.errorMsg = response.data.message;
          }
        });
    },

    //data edited modal input show
    addEdituser: function (user) {
      this.edit = user;
    },

    //data edit
    updateUser: function () {
      let formUpData = this.MyFormUpData(this.form);

      //axios data conver in json

      axios
        .post(
          "http://localhost/Laravel_Vue/vue_crud/api.php?action=update",
          formUpData
        )
        .then(function (response) {
          if (!response.data.error) {
            app.getData();
            app.form.name = "";
            app.form.email = "";
            app.form.password = "";
            app.errorMsg = null;
            app.successMsg = response.data.message;
          } else {
            app.successMsg = null;
            app.errorMsg = response.data.message;
          }
        });
    },
    //data send in database
    MyFormUpData: function (recieveUpData) {
      let data = new FormData();
      for (let key in recieveUpData) {
        data.append(key, recieveUpData[key]);
      }
      return data;
    },
  },
  mounted: function () {
    this.getData();
  },
});
