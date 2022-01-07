
// ページトップ
const topButton = document.getElementById('js-scroll-fadein')
function getScrolled() {
    return (window.pageYOffset !== undefined) ? window.pageYOffset: document.documentElement.scrollTop;
}
window.onscroll = function() {
    (getScrolled() > 500) ? topButton.classList.add('is-fadein'): topButton.classList.remove('is-fadein');
};
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};
topButton.onclick = function() {
    scrollToTop();
};
