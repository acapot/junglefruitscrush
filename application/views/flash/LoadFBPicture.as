﻿package  {		import flash.display.MovieClip;	import flash.events.Event;	import flash.events.IOErrorEvent;	import flash.events.SecurityErrorEvent;	import flash.events.MouseEvent;	import flashx.textLayout.operations.InsertInlineGraphicOperation;	import flash.display.Loader;	import flash.net.URLRequest;			public class LoadFBPicture extends MovieClip{				public var _imageURL:String;		public var loader:Loader;				public function LoadFBPicture(url:String, l:Loader) {			// constructor code			_imageURL = url;			loader = l;			loadProfile();					}				//===============start loading picture from facebook========		public function loadProfile():void		{			//_imageURL:String = "http://graph.facebook.com/100000283059105/picture";			//loader = new Loader();			loader.contentLoaderInfo.addEventListener(Event.COMPLETE, loader_completeHandler);			loader.contentLoaderInfo.addEventListener(SecurityErrorEvent.SECURITY_ERROR, loader_securityErrorHandler);			loader.contentLoaderInfo.addEventListener(IOErrorEvent.IO_ERROR, loader_ioErrorHandler);			loader.load(new URLRequest(_imageURL));		}				private function loader_securityErrorHandler(event:SecurityErrorEvent):void		{			trace(event.toString());		}				private function loader_ioErrorHandler(event:IOErrorEvent):void		{			trace(event.toString());		}				private function loader_completeHandler(event:Event):void		{			loader.contentLoaderInfo.removeEventListener(Event.COMPLETE, loader_completeHandler);			loader.contentLoaderInfo.removeEventListener(SecurityErrorEvent.SECURITY_ERROR, loader_securityErrorHandler);			loader.contentLoaderInfo.removeEventListener(IOErrorEvent.IO_ERROR, loader_ioErrorHandler);					//parent.addChild(loader);			//return loader;			//getPic();					}				public function getPic():void		{			//trace(parent.loader);    		//return loader;			//parent.addChild(loader);		}		//===============start loading picture from facebook========	}	}