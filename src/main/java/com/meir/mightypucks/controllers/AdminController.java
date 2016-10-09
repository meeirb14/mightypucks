package com.meir.mightypucks.controllers;

import java.text.DateFormat;
import java.util.Date;
import java.util.Locale;
import java.util.Map;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import com.mightypucks.models.Game;
import com.mightypucks.services.GameService;

/**
 * Handles requests for the application home page.
 */
@Controller
@RequestMapping("/admin")
public class AdminController {
	
	private GameService gameService;
	
	public AdminController(){
		gameService = new GameService();
	}
	
	/**
	 * 
	 */
	@RequestMapping(method = RequestMethod.GET)
	public String home(Locale locale, Map<String, Object> model) {
		
		
		//<td><form:select path="season" items="${seasonList}" /></td>
		
		
		Game gameForm = new Game();    
        model.put("gameForm", gameForm);
		
		return "admin";
	}
	
	
	@RequestMapping(value = { "addGame" }, method = { RequestMethod.POST })
	public String addGame(@ModelAttribute("gameForm") Game game, Map<String, Object> model){
		
		gameService.addGame(game);
		
		return "redirect:/";
	}
	
	
}
