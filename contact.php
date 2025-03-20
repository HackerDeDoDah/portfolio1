                <div class="contact-form" >
                    <form id="form" action="process_form.php" method="POST">
                            
                            

                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Name" value="<?php echo htmlspecialchars($_GET['name'] ?? ''); ?>"
                            style="<?php echo isset($_GET['errors']['name']) ? 'border: 2px solid red;' : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>"
                            style="<?php echo isset($_GET['errors']['email']) ? 'border: 2px solid red;' : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="company" name="company" placeholder="Company" value="<?php echo htmlspecialchars($_GET['company'] ?? ''); ?>"
                            style="<?php echo isset($_GET['errors']['company']) ? 'border: 2px solid red;' : ''; ?>">
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" rows="5" placeholder="Message" value="<?php echo htmlspecialchars($_GET['message'] ?? ''); ?>"
                            style="<?php echo isset($_GET['errors']['message']) ? 'border: 2px solid red;' : ''; ?>" required></textarea>
                        </div>
                        <button type="submit" id="submitButton">Submit</button>
                    </form>
                </div>
