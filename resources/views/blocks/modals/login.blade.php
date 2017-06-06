<modal-login inline-template>
    <div v-if="visible" id="modal-login" class="modal-container">
        {!! \Form::open(['route' => 'auth.login']) !!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button @click="closeModal()" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal">
                        <fieldset>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input name="email" type="text" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
                                    <div @click="forgotPassword" style="width:100%;text-align:right;margin-top:15px;"><a href="#reset"  data-toggle="modal" aria-hidden="true">Forgot Password?</a></div>
                                <div @click="createAccount" style="width:100%;text-align:right;"><a href="#signup"  data-toggle="modal" aria-hidden="true">Create Account</a></div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Or</label>
                <div class="col-lg-10">
                    <a href="{{route('auth.facebook.redirect')}}">
                        <div class="btn loginBtn loginBtn--facebook">Login with Facebook</div>
                    </a>
                    <a href="{{route('auth.google.redirect')}}">
                        <div class="btn loginBtn loginBtn--google">Login with Google</div>
                    </a>
                </div>
            </div>
            </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </div>
    </div>
    {!! \Form::close() !!}
    </div>
</modal-login>