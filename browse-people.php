<div class="ui grid">
    <div class="row">
        <div class="ui menu floated right" id="search-wrapper">
            <div class="ui red huge left attached button icon search"><i class="icon search"></i></div>
        </div>
        <div class="ui right wide sidebar inverted red vertical menu people">
            <div class="header item">
                <div class="ui labeled fluid input">
                    <input type="text" placeholder="Search...">
                    <div class="ui corner label"><i class="search icon"></i></div>
                </div>
            </div>
            <!-- ko foreach: people -->
            <a class="item person" data-bind="text: realname, click: LoadPerson,
            css: {active: $root.person().nickname == nickname}"></a>
            <!-- /ko -->
        </div>
    </div>
    <div class="row">
        <div class="ui page grid">
            <div class="column">
                <div class="ui icon floating message red right" data-bind="visible: person().nickname.length < 1">
                    <i class="icon arrow sign right"></i>
                    <div class="content header">
                        Select someone from the menu on the right to get started!
                    </div>
                </div>
                <div class="ui form segment" data-bind="visible: person().nickname.length > 0">
                <h2 class="ui dividing header" data-bind="text: person().realname">Edit Contact</h2>
                    <div class="two fields">
                        <div class="field">
                            <label>Nickname</label>
                            <div class="ui left labeled input">
                                <input type="text" placeholder="Nickname" data-bind="value: person().nickname">
                                <div class="ui corner label"><i class="icon asterisk"></i></div>
                            </div>
                        </div>
                        <div class="field">
                            <label>Real name</label>
                            <div class="ui left input">
                                <input type="text" placeholder="Real name" data-bind="value: person().realname">
                            </div>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="2 fluid ui buttons">
                        <button class="ui positive button big">Save Changes</button>
                        <div class="or"></div>
                        <button class="ui negative button big">Revert Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
viewmodel.person = ko.observable({nickname: ''});
viewmodel.people = ko.observableArray([]);
people.on('child_added', function(data){
var personData = data.val();
viewmodel.people.push(personData);
});
LoadPerson = function(p){
    viewmodel.person(p);
    $('.people.sidebar').sidebar('hide');
};
</script>