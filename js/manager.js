window.onload = function () {
    
    var createManagerForm = document.getElementById('createManagerForm');
    if (createManagerForm !== null) {
        createManagerForm.addEventListener('submit', validateManagerForm);
    }

    function validateManagerForm(event) {
        var form = manager.target;

        if (!confirm("Is the form data correct?")) {
            manager.preventDefault();
        }
    }

    
    var editManagerForm = document.getElementById('editManagerForm');
    if (editManagerForm !== null) {
        editManagerForm.addEventListener('submit', validateManagerForm);
    }

    
    var deleteLinks = document.getElementsByClassName('deleteManager');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this manager?")) {
            manager.preventDefault();
        }
    }

};

