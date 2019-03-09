package com.engineerskasa.linkapp.Models;

public class events {

    private String id,EventDesc,EventName,Icon,GroupName;

    public events(String id, String eventDesc, String eventName, String icon, String groupName) {
        this.id = id;
        EventDesc = eventDesc;
        EventName = eventName;
        Icon = icon;
        GroupName = groupName;
    }

    public events() {
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getEventDesc() {
        return EventDesc;
    }

    public void setEventDesc(String eventDesc) {
        EventDesc = eventDesc;
    }

    public String getEventName() {
        return EventName;
    }

    public void setEventName(String eventName) {
        EventName = eventName;
    }

    public String getIcon() {
        return Icon;
    }

    public void setIcon(String icon) {
        Icon = icon;
    }

    public String getGroupName() {
        return GroupName;
    }

    public void setGroupName(String groupName) {
        GroupName = groupName;
    }
}
