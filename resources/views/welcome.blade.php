
<Style>


h2 {
  position: relative;
  font-size: 8em;
  color: #222;
  letter-spacing: 0.1em;
  direction: rtl; /* تحديد الاتجاه ليكون من اليمين إلى اليسار */
}

h2::before {
  content: attr(data-text);
  position: absolute;
  color: #fff;
  width: 350px;
  overflow: hidden;
  white-space: nowrap;
  border-left: 2px solid #fff; /* تغيير الحافة لتكون من اليمين إلى اليسار */
  animation: anim 8s linear infinite;
  filter: drop-shadow(0 0 5px #fff) drop-shadow(0 0 10px #fff);
}

@keyframes anim {
  0%, 10%, 100% {
    width: 0;
  }
  70%, 90% {
    width: 100%;
  }
  /* ال hovver */
  


}



  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
}

/* ----------------- dark theme ----------------- */

:root{
  --bg-main:#f5f5f5;
  --bg-back:#000;
}

body{
  background-color: var(--bg-back);
  color: var(--bg-main);
}


a{
  color: var(--bg-main);
} 



/* --------------- dark theme --------------- */




.navbar{
    height: 80px;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.2rem;
    position: sticky;
    top: 0;
    z-index: 999;
}
.navbar__container {
    display: flex;
    justify-content: space-between;
    height: 80px;
    z-index: 1;
    width: 90%;
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 10px;
    text-transform: uppercase;
}
#navbar__logo {
    display: flex;
    align-items: center;
    cursor: pointer;
    text-decoration: none;
    font-size: 1.6rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    transition: 0.4s;
}

#navbar__logo:hover{
  scale: 105%;
}

.navbar__menu {
    display: flex;
    align-items: center;
    list-style: none;
}
.navbar__item {
    height: 80px;
}
.navbar__links {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 125px;
    text-decoration: none;
    height: 100%;
    transition: all 0.3s ease;
    letter-spacing: 0.1em;
    font-weight: 600;
}

.navbar__links:hover {
    scale: 105%;
}

.main{
    width: 100vw;
    height: 35.8vh;
    background-color: #7a7878;
    display: flex;
    align-items: center;
    justify-content: center;
}

.main h2{
    letter-spacing: 0.1em;
}

.toggle-btn{
  height: 4rem;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-right: 15px;
}

#checkbox{
  visibility: hidden;
}

#checkbox:checked + .toggle-label .toggle-ball{
  transform: translateX(1rem);
  background-color: #000;
}

.toggle-label{
  position: relative;
  width:3rem;
  height: 2rem;
  background: #ccc;
  display: inline-block;
  border-radius: 5rem;
}

.toggle-ball{
  position: absolute;
  top: 0.25rem;
  left: 0.25rem;
  width: 1.5rem;
  height: 1.5rem;
  border-radius: 50%;
  background: #fff;
  display: inline-block;
  transition: 0.3s;
}



/* ------------------ footer --------------------- */

.container{
  max-width: 1300px;
  margin: auto;
  padding-left: 2.5rem;
  padding-right: 2.5rem;
}

.footer{
  font-size: 1rem;
  padding: 80px 0 20px;
  align-items: top;
}


.footer h3{
  margin-bottom: 2.0rem;
}

.row{
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  justify-content: space-around;
}

.col-6{
  min-width: 250px;
  margin-bottom: 20px;
}

.footer-col-1{
  flex-basis: 30%;
}

.footer-col-2{
  flex: 1;
  text-align: center;
}

.footer-col-1 img{
  width: 180px;
  margin-bottom: 20px;
}

.footer-col-3 ,.footer-col-4{
  flex-basis: 12%;
  text-align: center;
}

ul{
  list-style: none;
}

.app-store{
  margin-top: 20px;
}

.app-logo img{
  width: 140px;
}


.copyright{
  text-align: center;
  padding-top: 1.2rem;
  margin-bottom: 1rem;
}

.footer hr{
  background: none;
  height: 1px;
}

.f-logo small{
  font-size: 1.6rem;
  padding-bottom: 1rem;
}

span{
  color: #f17969;
}

/* ------------------ footer --------------------- */

@media screen and (max-width: 1080px) {



  .app-logo img{
    width: 100px;
  }

  .footer{
    font-size: 1rem;
    padding: 60px 0 20px;
    text-align: center;
  }
    

}
/* dddddddd */

        /* ======================== */
        /* 
    Ignore the following styles. They are not important to achieve the effect.
    I'm only using them for looks (overall page background/font styles/centering content).
*/
      
        /* ======================== */


        .list {
          list-style: none;
          display: flex;
          align-items: center;
          gap: 40px;
        }
        .link {
          margin-right: 20px; /* تعديل القيمة حسب حاجتك */

          position: relative;
          display: inline-block;
          text-decoration: none;
          color: #fff;
          font-weight: 700;
        }

        .link::before,
        .link::after {
            content: '';
            position: absolute;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #00fffc;
            transform: scaleX(0);
            transition: transform 0.25s;
        }

        .link::before {
            top: -3px;
            transform-origin: left;
        }

        .link::after {
            bottom: -3px;
            transform-origin: right;
        }

        .link:hover::before,
        .link:hover::after,
        .active::before,
        .active::after {
            transform: scaleX(1);
        }


    </style>


 <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Responsive Hamburger Menu Using HTML,CSS and JavaScript</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- Navbar Here -->
  <nav class="navbar">
    <div class="navbar__container">

      <small  id="navbar__logo">Eng.<span>Abdulsamad</span></small>
      <ul class="navbar__menu">



    
        <!-- <li class="navbar__item"><a href="#home" class="navbar__links" id="home-page">Home</a></li> -->
        <li class="link"><a href="{{ route('customers.index') }}" class="link" id="category-page">إدارة الزبائن</a></li>

        <li class="link"><a href="{{ route('category.index') }}" class="link" id="category-page">صفحة التحكم</a></li>
        <li class="link"><a href="{{ route('categories.index2') }}"  class="link" id="about-page">بيع المنتجات</a></li>
        <li class="link"><a href="{{ route('productss.invoice') }}" class="link" id="about-page"> الفاتورة</a></li>
        <li class="link"><a href="{{ route('invoice.index') }}" class="link" id="about-page">سجل المبيعات</a></li>
      </ul>
    </div>

    <div class="toggle-btn">
      <input type="checkbox" id="checkbox">
      <label for="checkbox" class="toggle-label">
        <span class="toggle-ball"></span>
      </label>
    </div>
  </nav>
  
  <div class="main">
  <h2 data-text="&nbsp;مؤسسة الأمير التجارية&nbsp;">&nbsp;مؤسسة الأمير التجارية&nbsp;</h2>
  </div>
  <!-- -------------- footer -------------------- -->

  <div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-6 footer-col-1">
                <h3 class="link">بإدارة علي كبة</h3>
                <!-- <p>برنامج محاسبة</p> -->
                <!-- <div class="app-logo">
                    <img src="./app-store.png" alt="">
                    <img src="./play-store.png" alt="">
                </div> -->
            </div>
            <div class="col-6 footer-col-2">
                <h3 class="link">Eng.<span >Abdulsamad</span></h3>
                <ul>
                  <li class="link"> برمجة  </li>
                  <li class="link"> تصميم</li>
                  <li class="link"> تطوير</li>
              </ul>
            </div>
            <div class="col-6 footer-col-3">
                <h3>للتواصل معنا</h3>
                <ul>
                    <li > فيس بوك</li>
                    <li> واتس اب</li>
                    <li> إنستغرام</li>
  
                </ul>
            </div>
            <div class="col-6 footer-col-4">
                <h3>Follow Us</h3>
                <ul>
                    <li >abdoulsamad</li>
                    <li>+963937550394</li>
                    <li>Abdo Emad</li>
          
                </ul>
            </div>
        </div>
        <hr>
        <center>
          <br>
            <p class="link">abdoulsamad@gmail.com</p>
        </center>      
    </div>
</div>

<!-- partial -->


<script>

const toggle_Btn = document.querySelector('#checkbox');
const navbarLinks = document.querySelectorAll('.navbar__links')

toggle_Btn.addEventListener('change', () => {
    if(toggle_Btn.checked){
      for (const box of navbarLinks) {
      box.style.color = '#000';
      }
      document.body.style.backgroundColor="#f5f5f5"
      document.body.style.color="#000"
    }else{
      for (const box of navbarLinks) {
      box.style.color = '#f5f5f5';
      }
      document.body.style.backgroundColor="#000"
      document.body.style.color="#f5f5f5"
    }

    
})
</script>

</body>
</html>



