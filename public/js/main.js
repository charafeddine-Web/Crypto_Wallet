document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('sellModal');
    const sellButton = document.getElementById('sellButton');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const sellForm = document.getElementById('sellForm');

    function openSellModal() {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.getElementById('sellAmount').value = '';
    }

    function closeSellModal() {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    // Add event listeners
    sellButton.addEventListener('click', openSellModal);
    closeModalBtn.addEventListener('click', closeSellModal);
    cancelBtn.addEventListener('click', closeSellModal);

    // Close modal when clicking outside
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeSellModal();
        }
    });

    // Handle form submission
    sellForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const amount = document.getElementById('sellAmount').value;

        // Add your sell logic here
        console.log('Selling amount:', amount);

        // Close the modal after submission
        closeSellModal();
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeSellModal();
        }
    });
});