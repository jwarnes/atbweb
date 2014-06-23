<div class="ui grid">
    <div class="row">
        <div class="ui menu floated right" id="search-wrapper">
            <div class="ui red huge left attached button icon search"><i class="icon search"></i></div>
        </div>
        <div class="ui right wide sidebar inverted red vertical menu people">
            <div class="header item">
                <div class="ui labeled fluid input">
                    <input type="text" placeholder="Search..." data-bind="value: filter, valueUpdate: 'afterkeydown'">
                    <div class="ui corner label"><i class="search icon"></i></div>
                </div>
            </div>
            <!-- ko foreach: peopleFiltered -->
            <a class="item person" data-bind="text: nickname, click: LoadPerson,
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
                                <div class="ui left input">
                                    <input type="text" placeholder="Real name" data-bind="value: person().realname">
                                </div>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field"><label>Join date</label><input type="date" placeholder="Join date"></div>
                            <div class="field"><label>Birthday</label><input type="date" placeholder="Birthday"></div>
                            <div class="field">
                                <label>Gender</label>
                                <div class="ui fluid selection dropdown">
                                    <div class="text">Select</div>
                                    <i class="dropdown icon"></i>
                                    <input type="hidden" name="gender">
                                    <div class="menu">
                                        <div class="item" data-value="male">Male</div>
                                        <div class="item" data-value="female">Female</div>
                                        <div class="item" data-value="cyborg">Cyborg</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field"><div class="ui checkbox"><input type="checkbox"><label>Guild Member</label></div></div>
                        <div class="field"><div class="ui checkbox"><input type="checkbox"><label>Active Player</label></div></div>
                        <div class="ui horizontal icon divider"><i class="icon basic chat"></i></div>

                        <div class="three fields">
                            <div class="field">
                                <label for="">Phone</label>
                                <input type="text" placeholder="(888) 345 6789"></input>
                            </div>
                            <div class="field">
                                <label for="">Battletag</label>
                                <input type="text" placeholder="#SpudLuvr1263"></input>
                            </div>
                            <div class="field">
                                <label>Timezone</label>
                                <div class="ui fluid selection dropdown">
                                    <div class="text">Select</div>
                                    <i class="dropdown icon"></i>
                                    <input type="hidden" name="timezone">
                                    <div class="menu">
                                        <div class="item" data-value="est">EST</div>
                                        <div class="item" data-value="cdt">CDT</div>
                                        <div class="item" data-value="mdt">MDT</div>
                                        <div class="item" data-value="pdt">PDT</div>
                                        <div class="item" data-value="other">Other</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="field"><label for="">Notes</label><textarea placeholder="e.g., don't call after 10pm"></textarea></div>
                        <div class="ui divider"></div>

                        <div class="2 fluid ui buttons">
                            <button class="ui positive button big">Save Changes</button>
                            <div class="or"></div>
                            <button class="ui negative button big">Revert Changes</button>
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
<script>
    viewmodel.person = ko.observable({nickname: ''});
    viewmodel.people = ko.observableArray([]);
    viewmodel.filter = ko.observable('');

    people.on('child_added', function(data){
        var personData = data.val();
        viewmodel.people.push(personData);
    });

    viewmodel.peopleFiltered = ko.computed(function(){
         var filter = vm.filter().toLowerCase();
         if (!filter) return vm.people();

          return ko.utils.arrayFilter(vm.people(), function (person) {
                return (
                    //here be our search critera
                       ko.utils.stringStartsWith(person.nickname.toLowerCase(), filter)
                    || ko.utils.stringStartsWith(person.realname.toLowerCase(), filter)
                  //|| .....
                    );
            });

    },viewmodel);

    LoadPerson = function(p){
        viewmodel.person(p);
        $('.people.sidebar').sidebar('hide');
    };

    $(".contact.menu .item").tab();
</script>