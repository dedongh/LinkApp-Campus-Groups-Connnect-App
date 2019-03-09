package com.engineerskasa.linkapp.Models;

public class announcement {

    private String id,Description,GroupName,Date,Title,Icon,g_id;

    public announcement(String id, String description, String groupName, String date, String title, String icon, String g_id) {
        this.id = id;
        Description = description;
        GroupName = groupName;
        Date = date;
        Title = title;
        Icon = icon;
        this.g_id = g_id;
    }

    public announcement() {
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getDescription() {
        return Description;
    }

    public void setDescription(String description) {
        Description = description;
    }

    public String getGroupName() {
        return GroupName;
    }

    public void setGroupName(String groupName) {
        GroupName = groupName;
    }

    public String getDate() {
        return Date;
    }

    public void setDate(String date) {
        Date = date;
    }

    public String getTitle() {
        return Title;
    }

    public void setTitle(String title) {
        Title = title;
    }

    public String getIcon() {
        return Icon;
    }

    public void setIcon(String icon) {
        Icon = icon;
    }

    public String getG_id() {
        return g_id;
    }

    public void setG_id(String g_id) {
        this.g_id = g_id;
    }
}
