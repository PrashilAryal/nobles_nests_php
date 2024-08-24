<!DOCTYPE html>
<html>

<head>
    <title>Stripe Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('../../../../css/stripe.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>

<body>
    <div class="container stripe_container">
        <span><a href="{{ route('properties.show', $property->id) }}"><i class="bi bi-arrow-left"></i></a></span>
        <div class="stripe_header">
            <h1 class="stripe_title">Stripe Payment</h1>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <?php $showReceipt = false ?>

            @if (session('success'))
            @if (session('success') !== 'Logged in successfully')

            <div class="alert alert-success">{{ session('success') }}</div>
            <?php
            $showReceipt = true ?>
            @endif
            @endif
            <div class="stripe_property_title">
                <h3>{{$property->title}}</h3>
            </div>
            <div class="stripe_property_list">
                <div class="list">
                    <p class="d-flex justify-content-between">
                        <strong>Property ID:</strong>
                        <span>1134</span>
                    </p>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
                            <th scope="col" class="td-start">Attributes</th>
                            <th scope="col" class="td-end">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- <th scope="row">1</th> -->
                            <td class="td-start">Total Price:</td>
                            <td class="td-end">${{ number_format($property->total_price, 2)}}</td>
                        </tr>
                        <tr>
                            <td class="td-start">Booking Price:</td>
                            <td class="td-end">${{ number_format($property->booking_price, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="td-start">Location:</td>
                            <td class="td-end">{{ $property->city }}, {{ $property->district }}, {{ $property->state }}
                            </td>
                        </tr>
                        <tr>
                            <td class="td-start">Property Type:</td>
                            <td class="td-end">{{ $property->type }}</td>
                        </tr>
                        <tr>
                            <td class="td-start">Area:</td>
                            <td class="td-end">{{ $property->area }}
                                <!-- <sup>sq.ft.</sup> -->
                            </td>
                        </tr>
                        <tr>
                            <td class="td-start">Beds:</td>
                            <td class="td-end">{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td class="td-start">Kitchen:</td>
                            <td class="td-end">{{ $property->kitchens }}</td>
                        </tr>
                        <tr>
                            <td class="td-start">Parking:</td>
                            <td class="td-end">{{ $property->parking }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <?php if (!$showReceipt) {
            ?>
                <span class="stripe_amount">
                    ${{ number_format($property->booking_price, 2) }}
                </span>
                <div class="stripe_button">
                    <form action="{{ route('stripe.post', $property->id) }}" method="POST">
                        @csrf
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ env('STRIPE_KEY') }}" data-amount="{{ $property->price * 100 }}"
                            data-name="{{ $property->name }}" data-description="Payment for {{ $property->name }}"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto"
                            data-currency="usd">
                        </script>
                    </form>
                </div>
            <?php } else {
                echo '<div class="mb-2">Thank you for your booking.</div>';
            } ?>
        </div>
    </div>
</body>

</html>