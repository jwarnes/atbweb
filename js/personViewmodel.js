function Person()
{
    var self = this;

    self.nickname = ko.observable('');
    self.joindate = ko.observable('');

    self.realname = ko.observable('');
    self.phone = ko.observable('');
    self.birthday = ko.observable('');
    self.gender = ko.observable('');

    self.notes = ko.observable('');
    self.battletag = ko.observable('');
    self.timezone = ko.observable('');

    self.isGuildMember = ko.observable(false);
    self.isActive = ko.observable(false)
    self.loaded = ko.observable(false);

    self.updateObject = ko.computed(function(){
        var o = { public: {}, private: {} };
        o.public = {
            battletag: this.battletag || '',
            gender: this.gender,
            isActivePlayer: this.isActive,
            isGuildMember: this.isGuildMember,
            joindate: this.joindate,
            nickname: this.nickname,
            timezone: this.timezone
        };

        if(self.birthday())
            o.private.birthday = self.birthday;
        if(self.realname())
            o.private.realname = self.realname;
        if(self.phone())
            o.private.phone = self.phone;
        if(self.notes())
            o.private.contactNotes = self.notes;

        var o2 = ko.toJS(o);
        delete_null_properties(o2, true);

        return o2;
    },self);
}

function PersonListItem(data)
{
    var data = data || {};
    var self = this;
    self.nickname = ko.observable(data.nickname || '');
}