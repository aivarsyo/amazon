window.addEventListener("DOMContentLoaded", start);

function start() {
  const registerExists = document.querySelector("#register-form");
  if(registerExists){
      registerExists.addEventListener("submit", register)
  }
  const forgotForm = document.querySelector("#forgot-pass-form")
  if(forgotForm){
    forgotForm.addEventListener("submit", passAssistance)
  }
  const changePassForm = document.querySelector("#change-pass-form")
  if(changePassForm){
    changePassForm.addEventListener("submit", changePass)
  }
  const signInForm = document.querySelector("#signin-form")
  if(signInForm){
    signInForm.addEventListener("submit", signin)
  }
  const dropdown = document.querySelector(".dropdown")
  if(dropdown){
    const cover = document.querySelector("#trans-cover")
    dropdown.addEventListener("mouseover", function(){
      cover.style.display = "block"
    })
    dropdown.addEventListener("mouseout", function(){
      cover.style.display = "none"
    })
  }
  const addProductForm = document.querySelector("#addProduct");
  if(addProductForm){
    addProductForm.addEventListener("submit", addProduct)
  }
  const slider = document.querySelector(".product-images")
  if(slider){
    productGallery()
    document.querySelector("#edit-btn").addEventListener("click", showEditLog)
    document.querySelector(".close").addEventListener("click", closeEditLog)
    document.querySelector("#editProductForm").addEventListener("submit", editProduct)
  }

  const changeNameForm = document.querySelector("#change-name-form");
  if(changeNameForm){
    changeNameForm.addEventListener("submit", changeName)
  }

  const changeEmailForm = document.querySelector("#change-email-form");
  if(changeEmailForm){
    changeEmailForm.addEventListener("submit", changeEmail)
  }

  const changePasswordForm = document.querySelector("#change-password-form");
  if(changePasswordForm){
    changePasswordForm.addEventListener("submit", changePassword)
  }
} 

async function register() {
    document.querySelector(".lds-ellipsis").style.display = "inline-block"
    const form = this;
    let conn = await fetch("apis/api-register.php", {
      method: "POST",
      body: new FormData(form),
    });
    let res = await conn.json();
    console.log(res);
    document.querySelector(".lds-ellipsis").style.display = "none"
  
    if (conn.ok) {
      this.style.display = "none"  
      const success = document.querySelector(".log")
      success.style.display = "block"
    } else {
      const error = document.querySelector(".error-message")
      error.style.display = "flex"
      error.querySelector("span").innerHTML = res.info
    }
  }

  async function passAssistance() {
    document.querySelector(".lds-ellipsis").style.display = "inline-block"
    const form = this;
    let conn = await fetch("../apis/api-forgot-password.php", {
      method: "POST",
      body: new FormData(form),
    });
    let res = await conn.json();
    console.log(res);
    document.querySelector(".lds-ellipsis").style.display = "none"
    const error = document.querySelector(".log-full-width")
    if (conn.ok) {
      this.style.display = "none"  
      const success = document.querySelector(".log")
      success.style.display = "block"
      error.style.display = "none"
    } else {
      error.style.display = "block"
    }
  }

  async function changePass() {
    const form = this;
    let conn = await fetch("../apis/api-change-password.php", {
      method: "POST",
      body: new FormData(form),
    });
    let res = await conn.json();
    console.log(res);
    
    if (conn.ok) {
      this.style.display = "none"  
      const success = document.querySelector(".log")
      success.style.display = "block"
    } else {
      const error = document.querySelector(".error-message")
      error.querySelector("span").innerHTML = res.info
      error.style.display = "block"
    }
  }

  async function signin() {
    document.querySelector(".lds-ellipsis").style.display = "inline-block"
    const form = this;
    let conn = await fetch("apis/api-signin.php", {
      method: "POST",
      body: new FormData(form),
    });
    let res = await conn.json();
    console.log(res);
    document.querySelector(".lds-ellipsis").style.display = "none"
    
    if (conn.ok) {
      location.href="index"
    } else {
      const error = document.querySelector(".log__inner__fail")
      error.querySelector("span").innerHTML = res.info
      error.style.display = "flex"
    }
  }

  async function addProduct() {
    const form = this;
    let conn = await fetch("apis/api-add-product.php", {
      method: "POST",
      body: new FormData(form),
    });
    let res = await conn.json();
    console.log(res);
    
    if (conn.ok) {
      location.href = `product?id=${res.item_id}`;
    } else {
      const error = document.querySelector(".error-message")
      error.querySelector("span").innerHTML = res.info
      error.style.display = "flex"
    }
  }

  function productGallery(){
    const elem = document.querySelector('.product-images');
const flkty = new Flickity( elem, {
  // options
  wrapAround: true
});
  }

  async function deleteProduct(id) {
    let conn = await fetch("apis/api-delete-product.php?id="+id, {
      method: "DELETE"
    });
    let res = await conn.json();
    console.log(res);
    
    if (conn.ok) {
      location.href="index"
    }
  }

  function showEditLog(){
    document.querySelector(".editProduct").style.display = "block"
    document.querySelector("#trans-cover").style.display = "block"
  }

  function closeEditLog(){
    document.querySelector(".editProduct").style.display = "none"
    document.querySelector("#trans-cover").style.display = "none"
  }

  async function editProduct() {
    const form = this;
    let conn = await fetch("apis/api-edit-product.php?id="+this.dataset.id, {
      method: "POST",
      body: new FormData(form),
    });
    let res = await conn.json();
    console.log(res);
    
    if (conn.ok) {
      location.reload();
    }
  }


  async function changeName() {
    const form = this;
    let conn = await fetch("../apis/api-change-name.php", {
      method: "POST",
      body: new FormData(form),
    });
    let res = await conn.json();
    console.log(res);
    
    if (conn.ok) {
      location.href = "account";
    } else {
      const error = document.querySelector(".error-message")
      error.querySelector("span").innerHTML = res.info
      error.style.display = "flex"
    }
  }


  async function changeEmail() {
    document.querySelector(".lds-ellipsis").style.display = "inline-block"
    const form = this;
    let conn = await fetch("../apis/api-change-email.php", {
      method: "POST",
      body: new FormData(form),
    });
    let res = await conn.json();
    console.log(res);
    
    if (conn.ok) {
      location.href = "account";
    } else {
      const error = document.querySelector(".error-message")
      error.querySelector("span").innerHTML = res.info
      error.style.display = "flex"
    }
  }



  async function changePassword() {
    const form = this;
    let conn = await fetch("../apis/api-new-password.php", {
      method: "POST",
      body: new FormData(form),
    });
    let res = await conn.json();
    console.log(res);
    
    if (conn.ok) {
      location.href = "account";
    } else {
      const error = document.querySelector(".error-message")
      error.querySelector("span").innerHTML = res.info
      error.style.display = "flex"
    }
  }

