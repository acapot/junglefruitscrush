﻿package  {		import flash.display.MovieClip;	import flash.events.Event;	import flash.display.Stage;	import flash.events.MouseEvent;	import flash.display.DisplayObjectContainer;	import flash.external.ExternalInterface;	import flash.ui.Mouse;	import FruitsPanel;			public class InfoUpp extends MovieClip {				private var btnPlusGuldBar:BtnFriend;		private var btnPlusLives:BtnFriend;		private var btnShop:BtnFriend;		private var btnLikes:BtnFriend;		private var btnPlayFrnd:BtnFriend;		private var btnSoundMusic:BtnFriend;		private var btnSoundGame:BtnFriend;		public var btnMagicWand:BtnFriend;				private var helpFriend:HelpFriends;				public function InfoUpp() {			// constructor code			this.x=0;			this.y=0;			generatePlusBtn();						//Main.lives = 5;						addEventListener(Event.ENTER_FRAME, onEnter);					}				public function onEnter(event:Event)		{			lives2.text =Main.lives +"";		}				public function generatePlusBtn()		{			btnPlusGuldBar =new BtnFriend(15,16);			addChild(btnPlusGuldBar);			btnPlusGuldBar.x=190;			btnPlusGuldBar.y=33;						btnPlusLives =new BtnFriend(15,16);			addChild(btnPlusLives);			btnPlusLives.x=310;			btnPlusLives.y=33;						btnPlusLives.addEventListener(MouseEvent.CLICK, showFriensToGiveLives);						btnShop =new BtnFriend(19,20);			addChild(btnShop);			btnShop.x=510;			btnShop.y=40;						btnLikes =new BtnFriend(17,18);			addChild(btnLikes);			btnLikes.x=410;			btnLikes.y=35;						btnPlayFrnd =new BtnFriend(21,22);			addChild(btnPlayFrnd);			btnPlayFrnd.x=610;			btnPlayFrnd.y=40;						btnPlayFrnd.addEventListener(MouseEvent.CLICK, inviteFriends);						btnSoundMusic =new BtnFriend(23,24);			addChild(btnSoundMusic);			btnSoundMusic.x=30;			btnSoundMusic.y=35;						btnSoundMusic.addEventListener(MouseEvent.CLICK, stopMusic);						btnSoundGame =new BtnFriend(25,26);			addChild(btnSoundGame);			btnSoundGame.x=70;			btnSoundGame.y=35;						btnSoundGame.addEventListener(MouseEvent.CLICK, stopSoundGame);						btnMagicWand =new BtnFriend(27,28);			addChild(btnMagicWand);			btnMagicWand.x=700;			btnMagicWand.y=38;									magicWand.background=true;			magicWand.backgroundColor=0xFFFFFF;						lives2.background=true;			lives2.backgroundColor=0xFFFFFF;						magicWand.background=true;			magicWand.backgroundColor=0xFFFFFF;									guldBar.background=true;			guldBar.backgroundColor=0xFFFFFF;								}								public function stopMusic(event:Event)		{			GameSounds.funcPlayBgSound();			if(btnSoundMusic.frameNum1 == 23)			{				btnSoundMusic.frameNum1 = 24;							btnSoundMusic.frameNum2 = 23;			}						else			{				btnSoundMusic.frameNum1 = 23;							btnSoundMusic.frameNum2 = 24;			}		} 				public function stopSoundGame(event:Event)		{			GameSounds.switchPlaySound();			if(btnSoundGame.frameNum1 == 25)			{				btnSoundGame.frameNum1 = 26;							btnSoundGame.frameNum2 = 25;			}						else			{				btnSoundGame.frameNum1 = 25;							btnSoundGame.frameNum2 = 26;			}					}				public function inviteFriends(event:Event)		{						ExternalInterface.call("FacebookInviteFriends()");		} 				public function showFriensToGiveLives(event:Event)		{						trace(helpFriend);			//this is to not open more than one windows			if(helpFriend == null || !stage.contains(helpFriend))			{								trace("fff");				helpFriend = new HelpFriends(stage);				helpFriend.alpha = 0.8;				addChild(helpFriend);			}		 }		 		 public function removeEvents()		 {			removeEventListener(Event.ENTER_FRAME, onEnter);									btnPlusLives.removeEventListener(MouseEvent.CLICK, showFriensToGiveLives);									btnPlayFrnd.removeEventListener(MouseEvent.CLICK, inviteFriends);									btnSoundMusic.removeEventListener(MouseEvent.CLICK, stopMusic);									btnSoundGame.removeEventListener(MouseEvent.CLICK, stopSoundGame);						if (parent.contains(this))			{								parent.removeChild(this);							}					 }	}	}