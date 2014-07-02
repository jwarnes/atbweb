function Person()
{
    var self = this;

    self.nickname = ko.observable('');
    self.joindate = ko.observable('');

    self.realname = ko.observable('');
    self.phone = ko.observable('');
    self.loaded = ko.observable(false);
    
}

function PersonListItem(data)
{
    var data = data || {};
    var self = this;
    self.nickname = ko.observable(data.nickname || '');
}