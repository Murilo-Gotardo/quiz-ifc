export default {idC, idI};
document.querySelectorAll("span").forEach(function(span) {

    span.addEventListener("click", function(click) {
        let el = click.target;
        let idC = el.id;
    });
});
document.querySelectorAll("button").forEach(function(button) {

    button.addEventListener("click", function(click) {
        let cl = click.target;
        let idI = cl.id;   
    });
});