function Person(data)
{
    var data = data || {};
    var self = this;

    self.nickname = ko.observable(data.nickname || '');
    self.realname = ko.observable(data.realname || '');
    


}