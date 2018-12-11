let articles = document.getElementsByClassName('shop-article');
let korpa = localStorage.getItem('cart') || [];
if(typeof(korpa) == "string") korpa = korpa.split(',');

for(let article of articles)
{
    article.children[4].onclick = () => {
        const id = article.children[4].dataset['id'];
        korpa.push(id);
        localStorage.setItem('cart',korpa);
        alert("Stavljeno u korpu!");
    }
}