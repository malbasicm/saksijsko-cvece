window.onload = () => {
    const ul = document.getElementById("cart");
    const button = document.getElementById("buybutton");
    let korpa = localStorage.getItem('cart') || [];
    if(typeof(korpa) == "string") korpa = korpa.split(',');

    for(let item of korpa)
    {
        const li = document.createElement("li");
        axios.post('/getItem',
        {
            itemId: item
        }).then(r => {
            li.innerHTML = `${r.data.name} (${r.data.price}RSD)`;
            ul.appendChild(li);
        }).catch(e => {
            console.log(e);
        })
    }

    button.onclick = () => {
        korpa.forEach(async (v) => {
            await axios.post('/user/buy', {
                articleId: v
            });
        });
        localStorage.clear();
        location.href = "/";
    }
}