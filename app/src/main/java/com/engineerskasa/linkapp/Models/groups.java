package com.engineerskasa.linkapp.Models;

public class groups {
    private String g_id,GroupName,About,Aim,Icon,Vision,Contact;


    public groups(String g_id, String groupName, String about, String aim, String icon, String vision, String contact) {
        this.g_id = g_id;
        GroupName = groupName;
        About = about;
        Aim = aim;
        Icon = icon;
        Vision = vision;
        Contact = contact;
    }

    public groups() {
    }

    public String getG_id() {
        return g_id;
    }

    public void setG_id(String g_id) {
        this.g_id = g_id;
    }

    public String getGroupName() {
        return GroupName;
    }

    public void setGroupName(String groupName) {
        GroupName = groupName;
    }

    public String getAbout() {
        return About;
    }

    public void setAbout(String about) {
        About = about;
    }

    public String getAim() {
        return Aim;
    }

    public void setAim(String aim) {
        Aim = aim;
    }

    public String getIcon() {
        return Icon;
    }

    public void setIcon(String icon) {
        Icon = icon;
    }

    public String getVision() {
        return Vision;
    }

    public void setVision(String vision) {
        Vision = vision;
    }

    public String getContact() {
        return Contact;
    }

    public void setContact(String contact) {
        Contact = contact;
    }
}
