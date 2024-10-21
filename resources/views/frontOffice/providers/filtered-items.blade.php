@foreach($items as $item)
    <div class="col-lg-4 col-md-6 portfolio-item {{ $item->availability }} wow fadeInUp" data-wow-delay="0.1s">
        <div class="portfolio-inner rounded">
            <img class="img-fluid" src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}">

            <div class="portfolio-text">
                <h4 class="text-white mb-4">{{ $item->name }}</h4>
                <h4 class="text-white mb-4">{{ $item->cost }}</h4>
                <h4 class= "text-white mb-4">{{ $item->availability }}</h4>
                <div class="d-flex">
                                <a class="btn btn-lg-square rounded-circle mx-2" href="{{ asset('storage/' . $item->photo) }}" data-lightbox="portfolio">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-lg-square rounded-circle mx-2" 
                                   href="#" 
                                   onclick="openQuantityModal({{ $item->id }}, '{{ $item->name }}')">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Items End -->

<!-- Quantity Modal -->
<div class="modal" id="quantityModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalItemName"></h5>
                <button type="button" class="close" onclick="closeQuantityModal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addToCartForm" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="quantity">Select Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeQuantityModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Success and Next Step Modal -->
<div class="modal" id="nextStepModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Item Added Successfully!</h5>
                <button type="button" class="close" onclick="closeNextStepModal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>The item was successfully added to your cart. What would you like to do next?</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('cart.show') }}" class="btn btn-primary">View Cart</a>
                <button type="button" class="btn btn-secondary" onclick="closeNextStepModal()">Continue Shopping</button>
            </div>
        </div>
    </div>
</div>



<script>


    function openQuantityModal(itemId, itemName) {
        // Set item name in the modal title
        document.getElementById('modalItemName').textContent = `Add ${itemName} to Cart`;

        // Update form action to point to the correct route
        const form = document.getElementById('addToCartForm');
        form.action = `/cart/add/${itemId}`;

        // Show the modal
        document.getElementById('quantityModal').style.display = 'block';
    }

    function closeQuantityModal() {
        // Hide the modal
        document.getElementById('quantityModal').style.display = 'none';
    }

    // Handle the quantity modal submission
    document.getElementById('addToCartForm').addEventListener('submit', function (event) {
        event.preventDefault();  // Prevent default form submission

        const form = event.target;
        const formData = new FormData(form);

        // Send the form data using Fetch API
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())  // Expect JSON response
        .then(data => {
            if (data.success) {
                closeQuantityModal();  // Close the quantity modal
                showNextStepModal();   // Show the success/next step modal
            } else {
                alert('An error occurred while adding the item to the cart.');
            }
        })
        .catch(error => console.error('Error:', error));
    });

    function showNextStepModal() {
        document.getElementById('nextStepModal').style.display = 'block';
    }

    function closeNextStepModal() {
        document.getElementById('nextStepModal').style.display = 'none';
    }
</script>

