const searchButton = document.querySelector('.search-button');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');

// hilangkan button search
searchButton.style.display = 'none';

// event ketika kita menuliskan keyword
keyword.addEventListener('keyup', function(){
    // ajax
    // ada 2 cara guna ajax. 1-guna xmlhttprequest 2-guna fetch

    // cara xmlhttprequest
    // const xhr = new XMLHttpRequest();
    // xhr.onreadystatechange = function(){
    //     if(xhr.readyState == 4 && xhr.status == 200){
    //         container.innerHTML = xhr.responseText;
    //     }
    // };

    // xhr.open('get', 'ajax/ajax_search.php?keyword=' + keyword.value);
    // xhr.send();

    // cara fetch
    fetch('ajax/ajax_search.php?keyword=' + keyword.value)
    .then((response) => response.text())
    .then((response) => (container.innerHTML = response));

});