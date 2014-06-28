<div class="ui small modal" id="add-person-modal">
    <i class="close icon"></i>
    <h2 class="dividing header green">Add new contact</h2>
    <div class="ui form segment">
        <div class="two fields">
            <div class="field">
                <label>Nickname</label>
                <div class="ui left labeled input">
                    <input type="text" placeholder="Nickname" id="add-nickname" data-bind="value: nickname, valueUpdate: 'afterkeydown'">
                    <div class="ui corner label"><i class="icon asterisk"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Real name</label>
                <div class="ui left input">
                    <input type="text" placeholder="Real name" data-bind="value: realname">
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui button">
            Cancel
        </div>
        <div class="ui buttons">
            <button class="ui button blue big" 
            data-bind="enable: nickname().length > 0, css: {disabled: nickname().length < 1}, click: GetStarted">
            Get Started
        </button>
        <div class="or"></div>
        <button class="ui button positive big"
        data-bind="enable: nickname().length > 0, css: {disabled: nickname().length < 1}, click: QuickAdd">
        Quick Add
    </button>
</div>
</div>
</div>

<script>
    viewmodel.nickname = ko.observable('');
    viewmodel.realname = ko.observable('');

    function QuickAdd()
    {
        people.push({nickname: viewmodel.nickname(), realname: viewmodel.realname()});
    }
    function GetStarted()
    {
        var newPersonRef = people.push({nickname: viewmodel.nickname(), realname: viewmodel.realname()});
        console.log(newPersonRef);
    }
    function ClearModal()
    {
        viewmodel.nickname('');
        viewmodel.realname('');
    }
</script>