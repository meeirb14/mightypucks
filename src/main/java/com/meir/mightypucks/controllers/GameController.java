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

/**
 * Handles requests for the application home page.
 */
@Controller
@RequestMapping("/game")
public class GameController {
	
	/**
	 * 
	 */
	@RequestMapping(method = RequestMethod.GET)
	public String home(Locale locale, Map<String, Object> model) {
		
		
		
		
		return "games";
	}
	
	
}
