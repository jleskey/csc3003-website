<!DOCTYPE html>
<html lang="en">

<head>
    <title>Feedback &bullet; Authorial Amenities</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles/main.css">
    <script src="../scripts/validation.js" defer></script>
    <script src="../scripts/feedback.js"></script>
</head>

<body>
    <header>
        <img src="../assets/logo.png" alt="Authorial Amenities">
        <nav>
            <ul>
                <li><a href="../main.html">Home</a></li>
                <li>
                    <button>About</button>
                    <ul>
                        <li><a href="../about/vision.html">Vision</a></li>
                        <li><a href="../about/history.html">History</a></li>
                    </ul>
                </li>
                <li><a href="../services.html">Our Services</a></li>
                <li><a href="." class="active">Resources</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <header>
            <h1>Leave us some feedback!</h1>
        </header>
        <form>
            <div class="field">
                <label for="first">First Name</label>
                <input id="first" name="first" placeholder="Jane" autofocus required autocomplete="given-name"
                    autocapitalize="words">
            </div>
            <div class="field">
                <label for="last">Last Name</label>
                <input id="last" name="last" placeholder="Doe" autocomplete="family-name" required
                    autocapitalize="words">
            </div>
            <div class="field">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="jane@example.com" autocomplete="email"
                    pattern=".+@.+\..{2,}" required>
            </div>
            <div class="field">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="123-456-7890" autocomplete="mobile"
                    pattern="\(?\d{3}\)?(-| )?\d{3}-?\d{4}" required>
            </div>
            <div class="field">
                <label for="type">Feedback Type</label>
                <select id="type" name="type" required>
                    <option value="" disabled selected>Select an option</option>
                    <option value="question">Question</option>
                    <option value="comment">Comment</option>
                    <option value="concern">Concern</option>
                </select>
            </div>
            <div class="field">
                <label for="area">In what area does this feedback apply?</label>
                <select id="area" name="area" required>
                    <option value="" disabled selected>Select an option</option>
                    <optgroup label="General">
                        <option value="pricing">Pricing</option>
                        <option value="operations">Operations</option>
                        <option value="other">Other</option>
                    </optgroup>
                    <optgroup label="Services">
                        <option value="writing">Writing and ghostwriting</option>
                        <option value="editing">Editing and proofreading</option>
                        <option value="webdev">Website development</option>
                        <option value="dev">Software tool development</option>
                    </optgroup>
                </select>
            </div>
            <div class="field">
                <label for="satisfaction">How satisified are you with our overall service?</label>
                <input type="range" id="satisfaction" name="satisfaction" list="satisfaction-marks" min="1" max="10">
                <datalist id="satisfaction-marks">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </datalist>
            </div>
            <div class="field">
                <label for="message">Your Message</label>
                <textarea id="message" name="message" cols="64" rows="8" required
                    placeholder="Please provide as much detail as you can."></textarea>
            </div>
            <div class="field">
                <label for="date">If applicable, what is the date of this incident?</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="controls">
                <input type="reset" value="Clear form">
                <input type="submit" value="Submit feedback">
            </div>
        </form>
    </main>
    <footer>
        Authorial Amenities
        <address>
            1024 Lovelace Ln<br>
            Babbage, Null 000<br>
            Phone: <a href="tel:+1-999-999-9999">+1 (999) 999-9999</a><br>
            Email: <a href="mailto:josleskey@mail.mvnu.edu">josleskey@mail.mvnu.edu</a><br>
        </address>
        <p>
            &copy; 2025 Joseph Leskey
        </p>
    </footer>
</body>

</html>
