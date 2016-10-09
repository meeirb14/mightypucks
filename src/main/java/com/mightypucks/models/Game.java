package com.mightypucks.models;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Table;

import org.hibernate.annotations.Columns;
import org.joda.time.LocalDate;

@Entity
@Table(name = "games")
public class Game {
	
	@Id
	@Column(name = "id")
	int id;
	@Column(name = "vsTeam")
	String vsTeam;
	@Column(name = "date")
	LocalDate date; 
	@Column(name = "season_id")
	int season_id;
	@Column(name = "youtubeLink")
	String youtubeLink;
	
	public Game(){
		
	}
	
	public Game(int id, String vsTeam, LocalDate date, int season_id, String youtubeLink) {
		super();
		this.id = id;
		this.vsTeam = vsTeam;
		this.date = date;
		this.season_id = season_id;
		this.youtubeLink = youtubeLink;
	}
	
    
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	
	public String getVsTeam() {
		return vsTeam;
	}
	public void setVsTeam(String vsTeam) {
		this.vsTeam = vsTeam;
	}
	
	public LocalDate getDate() {
		return date;
	}
	public void setDate(LocalDate date) {
		this.date = date;
	}
	
	public int getSeason_id() {
		return season_id;
	}
	public void setSeason_id(int season_id) {
		this.season_id = season_id;
	}
	
	public String getYoutubeLink() {
		return youtubeLink;
	}
	public void setYoutubeLink(String youtubeLink) {
		this.youtubeLink = youtubeLink;
	}

}
