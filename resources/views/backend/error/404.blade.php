<style>
    .content{
        display: block;
        text-align: center;
        margin-top: 15%;
    }
    .error_code{
        font-size: 110px;
        margin-bottom: 5px;
    }
</style>
    <section class="content">
        <div class="error-page">
            <h1 class="error_code">404</h1>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

                <p>
                    <a href="{{ route('index') }}">Return to home</a>
                </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>


