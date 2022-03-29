
let input = document.getElementById('search');
let search = document.getElementById('list-search');

input.addEventListener('keyup', (e) => {
    let value = e.target.value
    
    removeOldList()
    query(value)
    .then(d => d.json())
    .then(d => {
        if(value !== ""){
            for(let i = 0; i < d.length; i++){
                let li = document.createElement('li');
                search.appendChild(li);
                li.innerHTML = d[i].name
            }
        }
    })
    
})

const query = async (value) => {
    return await fetch(`https://ans01.sites.3wa.io/projects/mvc-php/index.php?url=search&q=${value}`);
}

function removeOldList() {
    let listItem = search.children
    
    for(let i = listItem.length - 1; i >= 0; i--){
        listItem[i].remove();
    }
}

