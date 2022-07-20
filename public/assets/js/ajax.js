let input = document.getElementById('search');
let search = document.getElementById('list-search');

input.addEventListener('keyup', (e) => {
    let value = e.target.value

    removeOldList()
    query(value)
        .then(d => d.json())
        .then(d => {
            if (value !== "") {
                for (let i = 0; i < d.length; i++) {
                    let li = document.createElement('li');
                    search.appendChild(li);
                    li.innerHTML = `<a href="./index.php?url=product&id=${d[i].id}">${d[i].name}</a>`
                }
            }
        })

})

const query = async (value) => {
    return await fetch(`./index.php?url=search&q=${value}`, {
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    });
}

function removeOldList() {
    let listItem = search.children

    for (let i = listItem.length - 1; i >= 0; i--) {
        listItem[i].remove();
    }
}

