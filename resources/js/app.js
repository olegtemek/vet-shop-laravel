import './bootstrap';



if (document.querySelector('.header__nav')) {
  let nav = document.querySelector('.header__nav')
  nav.querySelectorAll('a').forEach(link => {
    if (location.href == link.href) {
      link.classList.add('active')
    }
  })


  let menus = document.querySelectorAll('.header__menu li.menu');
  menus.forEach((menu) => {
    menu.addEventListener('click', () => {
      menu.querySelector('ul').classList.toggle('active')
      menu.classList.toggle('active')
    })
  })

  let menu_button = document.querySelector('.header__menu > i')
  menu_button.addEventListener('click', () => {
    document.querySelector('.header__menu').classList.add('active')
    document.addEventListener('click', function (e) {
      if (e.target.tagName != 'LI' && e.target.tagName != 'UL' && e.target.tagName != 'I') {
        document.querySelector('.header__menu').classList.remove('active')
      }
    })
  })
}