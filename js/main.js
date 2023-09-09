// Add event listeners to the navigation links
var links = document.querySelectorAll('.sidebar a');

links.forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        
        var menu = this.getAttribute('href').replace('index.php?menu=', '');
        
        // Reload the page with the selected menu
        window.location.href = 'index.php?menu=' + menu;
    });
});
