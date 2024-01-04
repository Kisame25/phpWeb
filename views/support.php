<?php require 'components/Header.php' ?>


<body>
    <!-- <?php require 'components/Nav.php' ?> -->
    <main class="mt-4">
        <div class="container">
            <h1 class="fw-bold">Support</h1>
            <p class="ms-5">Please say somthing</p>
            <form method="post" class="ms-5">
                <pre class="fw-bold"><?= $cmd?></pre>
                <label for="message" class="form-label fw-bold ms-2">Message</label>
                <textarea id="message" class="form-control" name="message" placeholder="Your Message" rows="6" required></textarea>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </main>
<?php require 'components/script.php'?>
<?php require 'components/footer.php'?>