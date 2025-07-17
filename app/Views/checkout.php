<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4">Checkout</h2>
            
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif; ?>
            
            <form action="/order/placeOrder" method="post">
                <?= csrf_field() ?>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Billing Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" 
                                       value="<?= old('first_name') ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" 
                                       value="<?= old('last_name') ?>" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?= old('email') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone *</label>
                            <input type="tel" class="form-control" id="phone" name="phone" 
                                   value="<?= old('phone') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Address *</label>
                            <textarea class="form-control" id="address" name="address" 
                                      rows="3" required><?= old('address') ?></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">City *</label>
                                <input type="text" class="form-control" id="city" name="city" 
                                       value="<?= old('city') ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state" class="form-label">State *</label>
                                <input type="text" class="form-control" id="state" name="state" 
                                       value="<?= old('state') ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="postcode" class="form-label">Postcode *</label>
                                <input type="text" class="form-control" id="postcode" name="postcode" 
                                       value="<?= old('postcode') ?>" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="order_notes" class="form-label">Order Notes (Optional)</label>
                            <textarea class="form-control" id="order_notes" name="order_notes" 
                                      rows="3"><?= old('order_notes') ?></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Payment Method</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment" 
                                   id="payment1" value="credit_card" checked>
                            <label class="form-check-label" for="payment1">
                                Credit Card
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment" 
                                   id="payment2" value="paypal">
                            <label class="form-check-label" for="payment2">
                                PayPal
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment" 
                                   id="payment3" value="bank_transfer">
                            <label class="form-check-label" for="payment3">
                                Bank Transfer
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="1" 
                           id="agree" name="agree" required>
                    <label class="form-check-label" for="agree">
                        I agree to the <a href="#">terms and conditions</a> *
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-lg w-100">Place Order</button>
            </form>
        </div>
        
       <!-- In your order summary section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Your Order</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                             <tbody>
                                <?php foreach ($cart as $item): ?>
                                <tr>
                                    <td><?= esc($item['name']) ?> × <?= esc($item['quantity']) ?></td>
                                    <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>

<?= $this->endSection() ?>