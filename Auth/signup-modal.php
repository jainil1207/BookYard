<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #000000; border: 1px solid #ffffff;">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="signupModalLabel" style="color: #ffffff;">Create Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-muted text-center mb-4">Join BookYard today</p>
        
        <form id="signupForm">
          <div class="form-group">
            <label for="fullname" style="color: #ffffff;">Full Name</label>
            <input type="text" class="form-control" id="fullname" placeholder="Enter your full name" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
          </div>
          
          <div class="form-group">
            <label for="email" style="color: #ffffff;">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
          </div>
          
          <div class="form-group">
            <label for="password" style="color: #ffffff;">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Create a password" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
          </div>
          
          <div class="form-group">
            <label for="confirmPassword" style="color: #ffffff;">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password" required style="background-color: #000000; color: #ffffff; border-color: #ffffff;">
          </div>
          
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="terms" required>
            <label class="form-check-label" for="terms" style="color: #ffffff;">
              I agree to the <a href="#" class="text-primary">Terms and Conditions</a>
            </label>
          </div>
          
          <button type="submit" class="btn btn-primary w-100" style="background-color: #ffffff; border-color: #ffffff; color: #000000;">Sign Up</button>
          
          <div class="text-center mt-3">
            <p class="text-muted">Already have an account? <a href="#" onclick="showLoginModal()" class="text-primary">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


