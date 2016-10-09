package com.mightypucks.services;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.boot.registry.StandardServiceRegistryBuilder;
import org.hibernate.cfg.Configuration;
import org.springframework.beans.factory.annotation.Autowired;


import com.mightypucks.models.Game;


public class GameService {

	//@Autowired
	
	//private SessionFactory sessionFactory;
	Session session;
	
	public GameService(){
		
		Configuration configuration = new Configuration();		
        configuration.configure("hibernate.cfg.xml");
        StandardServiceRegistryBuilder ssrb = new StandardServiceRegistryBuilder().applySettings(configuration.getProperties());
        SessionFactory sessionFactory = configuration.buildSessionFactory(ssrb.build());
        session = sessionFactory.openSession();
		

	}
	
	/** 
	 * add the game to the database
	 * @param game
	 */
	public void addGame(Game game){
		session.persist(game);
	}
	
}
