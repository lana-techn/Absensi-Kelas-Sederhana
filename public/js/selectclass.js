let boxChecks = document.querySelectorAll('.boxcheck');

boxChecks.forEach(box => {
    box.addEventListener('click', function(e) {
        if (e.target.tagName !== 'INPUT') {
            let checkbox = box.querySelector('.check');
            checkbox.checked = !checkbox.checked; 
        }

        let checkboxes = document.querySelectorAll('.check');
        let addallButtons = document.querySelectorAll('.add_all');
        
        let isAnyChecked = Array.from(checkboxes).some(cb => cb.checked);

        addallButtons.forEach(function(button) {
            if (isAnyChecked) {
                button.style.display = 'block';
            } else {
                button.style.display = 'none'; 
            }
        });
    });
});
