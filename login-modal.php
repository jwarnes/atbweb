<div class="ui small modal" id="login-modal">
    <i class="close icon"></i>
    <h2 class="dividing header green">Login</h2>
    <div class="ui form segment">
        <div class="two fields">
          <div class="field">
            <label>Email</label>
            <div class="ui left labeled icon input">
              <input type="text" placeholder="you@whatever.com" data-bind="value: forms.login.user" id="login-email">
              <i class="user icon"></i>
              <div class="ui corner label">
                <i class="icon asterisk"></i>
            </div>
        </div>
    </div>
    <div class="field">
        <label>Password</label>
        <div class="ui left labeled icon input">
          <input type="password" data-bind="value: forms.login.pw">
          <i class="lock icon"></i>
          <div class="ui corner label">
            <i class="icon asterisk"></i>
        </div>
    </div>
</div>
</div>
</div>
<div class="actions">
    <div class="ui button">
        Cancel
    </div>
    <button class="ui button blue big" id="login-modal-submit" data-bind="click: LogMeIn">Login</button>
</div>
</div>

<script>
viewmodel.forms = { login: {} };
viewmodel.forms.login.user = ko.observable('');
viewmodel.forms.login.pw = ko.observable('');
function LogMeIn()
{
    console.log("Logging in as "+vm.forms.login.user() + "...");
    auth.login("password", {email: vm.forms.login.user(), password: vm.forms.login.pw() } );
}
</script>