import axios from 'axios';
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


if (document.querySelectorAll('.add-to-cart')) {
  let buttons = document.querySelectorAll('.add-to-cart');

  buttons.forEach(button => {
    button.addEventListener('click', async function () {
      let product = this.parentNode;
      let product_id = product.querySelector('input').value;

      let res = await axios.post('/add-cart', { id: product_id });
      console.log(res);
    })
  });
}

if (document.querySelectorAll('.products__filter-item > input')) {
  let checkboxes = document.querySelectorAll('.products__filter-item > input');

  setFiltersId()

  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
      setFiltersId()
    })
  });

  function setFiltersId() {
    let filters_ids = document.getElementById('filters_id');
    filters_ids.value = '';
    let checkboxes_checked = document.querySelectorAll('.products__filter-item > input:checked');
    let array_ids = [];
    checkboxes_checked.forEach(checkbox => {
      array_ids.push(checkbox.value);
    });
    filters_ids.value = array_ids;

  }
}