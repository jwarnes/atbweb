<div class="ui grid">
    <div class="row">
        <div class="ui menu floated right" id="search-wrapper">
            <div class="ui red huge left attached button icon search"><i class="icon search"></i></div>
        </div>
        <div class="ui right wide floating overlay sidebar inverted red vertical menu people">
            <div class="header item">
                <div class="ui labeled fluid input" data-bind="visible: authenticated()">
                    <input type="text" placeholder="Search by real name or nickname" data-bind="value: filter, valueUpdate: 'afterkeydown'">
                    <div class="ui corner label"><i class="search icon"></i></div>
                </div>
                <div class="ui inverted message red icon" data-bind="visible: !authenticated()">
                <i class="icon warning small"></i>
                    You are not logged in. Log in to access information.
                </div>
            </div>
            <!-- ko foreach: peopleFiltered -->
            <a class="item person" data-bind="text: nickname, click: LoadPerson,
            css: {active: $root.person().nickname == nickname}, visible: $root.authenticated()"></a>
            <!-- /ko -->
        </div>
    </div>
    <div class="row">
        <div class="ui page grid">
            <div class="column">
                <div class="ui icon floating message red right" data-bind="visible: !person().loaded()">
                    <i class="icon arrow sign right"></i>
                    <div class="content header">
                        Select someone from the menu on the right to get started!
                    </div>
                </div>
                <div class="ui form segment" data-bind="visible: person().loaded()">
                    <h2 class="ui dividing header"><span data-bind="text: person().nickname"/>
                    </h2>
                    <div class="ui secondary text contact menu">
                        <a class="active item" data-tab="edit"><i class="icon edit sign"></i>Edit</a>
                        <a class="item" data-tab="summary">Summary</a>
                        <a class="item" data-tab="characters">Characters</a>
                        <a class="item" data-tab="relationship">Relationship</a>
                        <a class="item" data-tab="incidents">Incidents</a>
                        <a class="item" data-tab="attendance">Attendance</a>
                        <a class="item" data-tab="performance">Performance</a>
                        <a class="item" data-tab="loot">Loot</a>

                    </div>
                    <div class="ui tab" data-tab="edit">
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
                                <div data-bind="template: {name: permissions().canSeeContactInfo ? 'real-name' : 'locked'}"></div>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field">
                                <label>Join date</label><div class="ui left input"> <input data-bind="value: person().joindate" type="text" placeholder="Join date"></div></div>
                            <div class="field">
                                <label>Birthday</label>
                                 <div data-bind="template: {name: permissions().canSeeContactInfo ? 'birthday' : 'locked'}"></div>
                            </div>
                            <div class="field">
                                <label>Gender</label>
                                <div class="ui fluid selection dropdown gender">
                                    <div class="text" data-bind="text: person().gender().capitalize()">Select</div>
                                    <i class="dropdown icon"></i>
                                    <input type="hidden" name="gender" data-bind="value: person().gender">
                                    <div class="menu">
                                        <div class="item" data-value="male">Male</div>
                                        <div class="item" data-value="female">Female</div>
                                        <div class="item" data-value="cyborg">Cyborg</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field"><div class="ui checkbox"><input data-bind="checked: person().isGuildMember" type="checkbox" id="isGuildMember"><label>Guild Member</label></div></div>
                        <div class="field"><div class="ui checkbox"><input data-bind="checked: person().isActive" type="checkbox" id="isActive"><label>Active Player</label></div></div>
                        <div class="ui horizontal icon divider"><i class="icon basic chat"></i></div>

                        <div class="three fields">
                            <div class="field">
                                <label for="">Phone</label>
                                <div data-bind="template: {name: permissions().canSeeContactInfo ? 'phone-num' : 'locked'}"></div>
                            </div>
                            <div class="field">
                                <label for="">Battletag</label>
                                <input data-bind="value: person().battletag" type="text" placeholder="SpudLuvr#1234"/>
                            </div>
                            <div class="field">
                                <label>Timezone</label>
                                <div class="ui fluid selection dropdown timezone">
                                    <div class="text" data-bind="text: person().timezone">Select</div>
                                    <i class="dropdown icon"></i>
                                    <input type="hidden" name="timezone" data-bind="value: person().timezone">
                                    <div class="menu">
                                        <div class="item" data-value="EST">EST</div>
                                        <div class="item" data-value="CDT">CDT</div>
                                        <div class="item" data-value="MDT">MDT</div>
                                        <div class="item" data-value="PDT">PDT</div>
                                        <div class="item" data-value="Other">Other</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="field"><label for="">Notes</label>
                            <div data-bind="template: {name: permissions().canSeeContactInfo ? 'contact-notes' : 'locked-area'}"></div>
                        <div class="ui divider"></div>

                        <div class="ui attached success message">
                            <i class="close icon"></i>
                            <div class="header">Changes saved.</div>
                        </div>

                        <div class="2 fluid ui buttons">
                            <button class="ui positive save button big" 
                            data-bind="enable: permissions().canEditContacts, css: { disabled: !permissions().canEditContacts}, click: SavePerson">Save Changes</button>
                            <div class="or"></div>
                            <button class="ui negative button big" data-bind="click: ReloadPerson">Revert Changes</button>
                        </div>
                    </div>
                </div>

                    <div class="ui tab" data-tab="summary">
                        <div class="ui message">
                            This panel will contain a feed of recent events and some overall statistics.
                        </div>
                    </div>

                    <div class="ui tab" data-tab="characters">
                        <div class="ui message">This panel will have a summarized list of this player's characters.</div>
                    </div>
                    <div class="ui tab" data-tab="relationship">
                        <div class="ui message">This panel will list all recorded communications to this player.</div>
                    </div>
                    <div class="ui tab" data-tab="incidents">
                        <div class="ui message">This panel will list incidents involving this player.</div>
                    </div>
                    <div class="ui tab" data-tab="attendance">
                        <div class="ui message">This panel will give detailed stats on the player's attendance.</div>
                    </div>
                    <div class="ui tab" data-tab="performance">
                        <div class="ui message">This panel will show highest and median output for boss encounters in the current tier, along with ranking information from raidbots.</div>
                    </div>
                    <div class="ui tab" data-tab="loot">
                        <div class="ui message">This panel will show all loot items awarded to this player, including time and place.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/html" id="locked">
    <div class="ui left labeled input icon">
        <i class="icon lock"></i>
        <input type="text" placeholder="Director access required" disabled>
    </div>
</script>

<script type="text/html" id="real-name">
    <div class="ui left input">
        <input type="text" placeholder="Real name" data-bind="value: person().realname">
    </div>
</script>


<script type="text/html" id="phone-num">
    <input data-bind="value: person().phone" type="text" placeholder="(888) 345 6789"/>
</script>

<script type="text/html" id="birthday">
    <div class="ui left input"><input data-bind="value: person().birthday" type="text" placeholder="Birthday"></div>
</script>

<script type="text/html" id="contact-notes">
    <textarea data-bind="value: person().notes" placeholder="e.g., don't call after 10pm"></textarea>
</script>

<script type="text/html" id="locked-area">
    <textarea disabled placeholder="Director access required."></textarea>
</script>

<script>
    viewmodel.person = ko.observable(new Person());
    viewmodel.people = ko.observableArray([]);
    viewmodel.filter = ko.observable('');
    viewmodel.previousNickname = ko.observable('');

    viewmodel.peopleFiltered = ko.computed(function(){
         var filter = vm.filter().toLowerCase();
         if (!filter) return vm.people();

          return ko.utils.arrayFilter(vm.people(), function (person) {
                return (
                    //here be our search critera
                       ko.utils.stringStartsWith(person.nickname().toLowerCase(), filter)
                  //|| .....
                    );
            });

    },viewmodel);

    LoadPerson = function(p){
        viewmodel.previousNickname(p.nickname());
        var ref = new Firebase('https://broforce.firebaseio.com/people/'+p.nickname() );

        var p = new Person();

        p.ref = ref;

        ref.child('public').once('value', function(data){  //public fields
            var d = data.val();
            p.nickname(d.nickname);
            p.joindate(d.joindate);
            p.gender(d.gender || 'Select');
            p.isGuildMember(d.isGuildMember || false);
            p.isActive(d.isActivePlayer || false);
            p.timezone(d.timezone || 'Select');
            p.battletag(d.battletag);
        } );

        ref.child('private').once('value', function(data){  //private fields
            var d = data.val();
            if(d){
                p.realname(d.realname);
                p.phone(d.phone);
                p.birthday(d.birthday);
                p.notes(d.contactNotes);
             }
        } );
        p.loaded(true);       

        viewmodel.person(p);

        $('.people.sidebar').sidebar('hide');
    };

    SavePerson = function(){
        $('.save.button').addClass("loading");
        $('.save.button').addClass("disabled");
        $('.save.button').prop("disabled", true);

        var p = viewmodel.person();
        var o = p.updateObject();

        o.public.isGuildMember = $("#isGuildMember")[0].checked;
        o.public.isActivePlayer = $("#isActive")[0].checked;

        console.log("Saving...");
        console.log(o);
        p.ref.update(o, SavePersonSuccess);
    };

    SavePersonSuccess = function(){
        $('.save.button').removeClass("loading");
        $('.save.button').removeClass("disabled");
        $('.save.button').prop("disabled", false);
        console.log("Saved.")

        $(".success.message").slideDown(200);
    };

    ReloadPerson = function(){
        LoadPerson({nickname: viewmodel.previousNickname });
    };

    $(".contact.menu .item").tab();
    $('.overlay.sidebar').sidebar({overlay: true});

    $(".success.message").hide();

    $(".success.message .close.icon").click(function(){ $(".success.message").slideUp(200); });

</script>