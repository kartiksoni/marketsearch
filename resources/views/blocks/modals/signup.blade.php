<modal-signup inline-template>
    <div v-if="visible" id="modal-signup" class="modal-container">
        {!! \Form::open(['route' => 'auth.register']) !!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button @click="closeModal()" type="button" class="close" data-dismiss="modal" aria-hidden="true"
                    >&times;</button>
                    <h4 class="modal-title">Create Account</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input name="email" :value="user.email" type="text" class="form-control"
                                           id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                                <div class="col-lg-10">
                                    <input name="username" :value="user.username" type="text" class="form-control"
                                           placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input name="password" :value="user.password" type="password" class="form-control"
                                           placeholder="Password">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
        {!! \Form::close() !!}
    </div>
</modal-signup>