<?php

	function cr_users($conn)
	{
		//create Table
		$sql = "CREATE TABLE `matcha`.`users` (
			`user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`user_first` varchar(256) NOT NULL,
			`user_last` varchar(256) NOT NULL,
			`user_email` varchar(256) NOT NULL,
			`user_uid` varchar(256) NOT NULL,
			`user_pwd` varchar(256) NOT NULL,
			`user_age` int(11) NOT NULL,
			`user_key` varchar(256) NOT NULL,
			`user_verified` tinyint(1) NOT NULL DEFAULT '0',
			`user_add` tinyint(1) NOT NULL DEFAULT '0',
			`user_status` varchar(256) NOT NULL DEFAULT 'Offline',
			`user_sDate` varchar(256) DEFAULT NULL
		  )";
		
		try
		{
			echo "<script type='text/javascript'>alert('1');</script>";
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}


		//populate table
		$sql = "INSERT INTO `matcha`.`users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`, `user_age`, `user_key`, `user_verified`, `user_add`, `user_status`, `user_sDate`) VALUES
		(1, 'James', 'Pirzenthal', 'pirzenthaljames@gmail.com', 'James', '\$2y\$10\$uFloWzPEtEa.3.X1WBR9juAwHjj3rzybYTwnMs5BTXBlqvnL.Yv72', 20, '04261dfc726dfdca2e23b8f129acdaeac9dca15865299364d38449d5ede71f15331de2201d5c754ba32119138ab4574b08fa896bc62e9704066b4ca5f5f7097c', 1, 1, 'Offline', '2018-12-14 10-05-47am'),
		(2, 'Emile', 'Nikel', 'pirzenthaljames@gmail.com', 'enikel', '\$2y\$10\$uXt3dH0opgRvkEc.WSd44evXhbEB6mxeYijPtcmoiSMge6nL5gsKG', 21, 'af4d71994b8a3f04e14b682993a3857ac2db622e13846b3703e7d7d0ff9eb4b71375a6c45401e09fdc71eeddc9064ae5567dcf7854f70ec114b15a7400802fdf', 1, 1, 'Offline', '2018-12-13 02-28-19pm'),
		(3, 'pieter', 'preez', 'pirzenthaljames@gmail.com', 'ppreez', '\$2y\$10\$3HHZULGnIIFSCyKXnTnD9.d7rM0N3vj4dVBMgOo/ZikQI.ukZ8SzG', 30, '4a87a59c75c76a0d151378bb56950df2ce5b768ea42f4221fc854b1b1e84d852be3fde0304bf4578769e0d95bca5ecb36b4389fb76f94189cd577017988ca706', 1, 1, 'Offline', '2018-12-13 02-17-37pm'),
		(4, 'Cassy', 'Pillay', 'pirzenthaljames@gmail.com', 'cpillay', '\$2y\$10\$wqdNDRUba.9sD.ZmJwhP7.hO4SMqQ.XSIBXwFOnWlxCa.iWnzkHSa', 24, '69bd98dc24467cba927064bf37721d6a369a57fd8b6078e7ae0cad1ad91314e504017b2fa2ea9b1c7e169c524ab8dcd533f723023d8d863cbf9cc2af4baf83fc', 1, 1, 'Offline', '2018-12-13 02-28-37pm'),
		(5, 'Sick', 'Boi', 'pirzenthaljames@gmail.com', 'Sick-Boi', '\$2y\$10\$auX66QXQedfz5RVCQsQnFeQj5vTY.y66EQmOu37BqwcXcxWliUOTG', 45, '06b69f1468bc33e8ea750a1bf9aaeebba2a54b54f0a1dc43436f0edb764e62b7f5c81ef193ee846e14d504e520eda3f37a0aa117ac30abc5955ae501caca3a63', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(6, 'Bobby', 'B', 'pirzenthaljames@gmail.com', 'Bobby-B', '\$2y\$10\$wVoBJsoisAF10GLhJDEfL.PtP2mdv7WcDTHLkkza2nY1kkW4jRuQC', 70, 'e897a03d374d05ad949b400f0d5f1e44cb52d28f06aa7ef7031088a330e0540efac4a76897a9f2ae2df2a35b2269bb4901af41869fef06764681c9594aecdeff', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(7, 'Rod', 'Knee', 'pirzenthaljames@gmail.com', 'rodney', '\$2y\$10\$ddn8IQdkXL0/XEyjPPju/O4BIQPJ2ODdwymeU8tdCEJprGp4N1xD6', 25, 'cbf1896bf8f1067022bab87d2f9763d42a4ccf5f0a61fb579f5d8e73c420b1cf6acf4445e45924420a1c38ea51246460e9101349d89dedcd4683d87c58e05f6a', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(8, 'Winston', 'P', 'pirzenthaljames@gmail.com', 'Winston', '\$2y\$10\$ZUgay8Ly7hRE3YFdbT0mSu8MooM2tSFic46CJuzEehgwhwWL94iVG', 45, '3e1b027d29d733ca09d6f5a95c94d3ceb13449d4918b4252333f5ed5ce667e516475f361559f031ff04c25565cf20acabda67197686523bec9d2c151271255e7', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(9, 'Max', 'D', 'pirzenthaljames@gmail.com', 'Maxed0ut', '\$2y\$10\$OKc.Jt36WFaTre/EgIkCiOXJ5vTDnvbL/H9tTti4/MW4KD9XwiZnO', 19, 'b2ebe6b2819aa25c418cd6b52bd6c64f20f5e37e841cf8f78406476ec1df61d17c0022d6c56673607e28001ad94eabc6e1d1b75794a9aa0043f7ec3528ba6dcb', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(10, 'Blaze', 'Thompson', 'pirzenthaljames@gmail.com', 'Blaze', '\$2y\$10\$YSJqlPkZw620ts912qflmeNkuBbC/kHPsgyr3BQ5/pom5O2woEKjy', 20, 'bbf07c0258bfce3ba9a243506c642bc1b8614fe0bb002e3291aa601bebe36b40bf0f68ab89463c4b02f801d77c6ea5861450a81ff060b15ed63e282e9d7c519b', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(11, 'Josh', 'Blaak', 'pirzenthaljames@gmail.com', 'Joshy', '\$2y\$10\$VJFNS2QOw8bGXP8RNxkD4.Lm3hSkRHrQ.vpjfigrtio9o57fyzAH6', 20, 'fed82f4e948c404e768803821b86b629c59849828a4517661e6e4827984ce103394549257587ff00d727ee31a6ee67aaba1a8b6bd7354a30c6f81ebbddfcfbda', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(12, 'Ray', 'Donovan', 'pirzenthaljames@gmail.com', 'RayRay', '\$2y\$10\$O675vY7avZYtmLJHqQBYZuMIg5gjC7ggOOvm34PK.S.GUBN5I1J2u', 30, '246e97f1f8d6dc5e467b2dfae03ef5c9bc6ebd1664eb5177570348c6e0d263564ccee288eb032a8102f559b63e2cee0eafb99ed26f8808def75665d19c5b96ff', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(13, 'Ronald', 'Weasley', 'pirzenthaljames@gmail.com', 'Ron', '\$2y\$10\$UcsSALHsYuXj46tDVHRET.jIhrIaikKkZqn9Fl8KUfW3SrUXPEUiG', 27, '4de1207a29b37971b7b5f75bb515aacd952311ac97a5858c3ab2f4283ee4ffc1723bc7dd758691c680a66fb238a70b5b8b1c0c2c7fd0f42d02ec40577d3668cd', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(14, 'Shamus', 'Finnigan', 'pirzenthaljames@gmail.com', 'Sham', '\$2y\$10\$9E7k02rcSkXcboA/M63Z8uNnnMm1UWnkVePRUtENg3q0PYH6ik1hi', 24, '8538f4deb64276bb98b858056294414e888360493dfa2e74ebf3426fa633e8493514a6e32d2ff97beff04b564bc8c74ad11d36e51a70a03f7e3cbe4a85ffccab', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(15, 'Duncan', 'Shields', 'pirzenthaljames@gmail.com', 'thorin', '\$2y\$10\$v5oJmrT7U61Y45Z0tRi00.qNB.ZlaDIXFDZ.pZ5xwQFSvOVUE9U4y', 45, '4a30a1e1bd028e4ba71c3ca14b1d80e06694756a0446e40a724eb2bdfc5447ee3a080ecd6fe46a4499775ea7a419a2d4722aaa45d5ed8d46a1badfc0d4f579c3', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(16, 'Olof', 'Meister', 'pirzenthaljames@gmail.com', 'Olof', '\$2y\$10\$1Rddaw0iGwiThLYeISU/kOGOzffLKAkm2rDBuYAbDTatFi846wiE.', 28, '887fbd71cbe93f39928c8f39afc8ed228305dd985480debb156224fc6190edf9e6894009a9d1477ff801172ccab2517666d1c14eb08fbffdd6b4e5efbb02208b', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(17, 'John', 'Lee', 'pirzenthaljames@gmail.com', 'John', '\$2y\$10\$ykjcABgJdnyzLpSZMQlBUO0EKaBuuRmx5VFyrblKLxySp9BOe39TG', 40, 'a47a64fee2533a890099a8cdd224c4b616330563d5b8e899c0149b4440fe43c5e119fd69821c0b9e1cb711d5bf5c36a157afa6daa2031a6a1fce240aee8b33d3', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(18, 'Harry', 'Potter', 'pirzenthaljames@gmail.com', 'hp', '\$2y\$10\$jrdZErqO5RAbbgIN/uznG.OFhQGa2qomc.foAwG9tdVNzBdefKauS', 21, 'f5765bbcc8c6879c89a7fd93264d10868a52da3bba28571c8f649e2a44d5e6a6cd4d8d3ea7b504d85612138d868c60907ffeb9cde8fd022022c4ba3e42766e90', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(19, 'Tom', 'Riddle', 'pirzenthaljames@gmail.com', 'Voldemort', '\$2y\$10\$qnMINWf7kyaep5BmyFWre.DRgvVRFrCF7l7vppqme9d9bOxV3xdXO', 58, '0ebd8f8c17f09d27f76b983eb48abf7a6da05dea6baae39f702b5c3fa6e418abd58cad6998fad12a5ddcf007ad5aa00cd7a8aeb8e01891ac4bf5adc6e6a466ff', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(20, 'Mac', 'Donalds', 'pirzenthaljames@gmail.com', 'Mcdees', '\$2y\$10\$24Kar/vggHU2hVLV6TWP8e52fav2q7BSgZCMk7c25pAF14ahSxogG', 18, '4479b5beeaa911e983c6e41235866d52c41bf2a37fd1f61945f37b8dbfe1bb568983d2cb85e5f056c3b916363e69e817e05c7ff50829e9c0a47339ab253593d4', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(21, 'Jon', 'Snow', 'pirzenthaljames@gmail.com', 'Jon', '\$2y\$10\$25kMNAUdNtDsCoyb5VZmS.kK8MC7g3P4RbB/jhpNs69iieSOFV5v2', 19, '9e0b0eb7721d70972ea56122c42506a0342d6aaa2d68ba863cda10b760b1c9e02c594baab6d003df32beebb83b03adc93436197defc25588505f378f8b931b85', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(22, 'Hermione', 'Granger', 'pirzenthaljames@gmail.com', 'Hermione', '\$2y\$10\$43ibmqCvrsVoUwAxVpbDt.CRBUWzYP9jFwjdF4TioKt8xOiM44cA.', 26, '6da2110f75c5157f3684e987c18bb0a7774c7ae9936c2999aaadbaf854b28947236f947dcbc5dd1ae34b082f325ea04f89c5ccc2014740a469b71975535c249c', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(23, 'Minerva', 'McGonagall', 'pirzenthaljames@gmail.com', 'Proffessor', '\$2y\$10\$rnVJomMkwDavez2QMlYpae9lXVnpFgm2iCZgX8CaiuGIplWDyUXgW', 68, '4c38949098bad1c1785c10289cc7ff21a18a27e1345c5c28e7aa7b3ddc84736b45c79c07f1823f12cf60c0d0479d596a50e5c1f689f6b0d8cdbba54d897bd3ee', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(24, 'JK', 'Rowling', 'pirzenthaljames@gmail.com', 'JK', '\$2y\$10\$cJieb33HEknyCQ.qqCVaSesP.iz5hiyhUpUEmCbNmh3ug9bZDZO1C', 40, 'b7a45d1f015413ee6458d590adfaa561888e1df47e3cec67aaeac43706b22d5be71fc57fdffc7ed803b441cb726a0e9d69d191acfe892fc2c9d5f963ddf14b4f', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(25, 'Agatha', 'Christie', 'pirzenthaljames@gmail.com', 'Agatha', '\$2y\$10\$ZGdeEu7uNgHNPE6qIeUtQ.5azXVZGbMo/R4g0xsp3yHKtgDHIc5c6', 128, '25226eea03bce763b1c8dc78cd8ae49287cf8a6efa1d387c8a41214762c24683d50acba4f3a46c04459f4e83addb5f0aa0ca3138bc5e7d65a3f2291150a30c08', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(26, 'Judy', 'Bloom', 'pirzenthaljames@gmail.com', 'Judy', '\$2y\$10\$JehKhGTHQV6bHiEMTqGe6usxwIozh2G1Cdi3VL2/N9hUTq.5ftVF.', 80, '5ad0d4b88b176c1ca9d1f6eb4dff2d0e5b201e872d2068520e1172418f8acb012e3297e826e503d08a61929bfdf07513d9c6be2eec47649b2818564c3f0aa22c', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(27, 'Yen', 'Noel', 'pirzenthaljames@gmail.com', 'Yen', '\$2y\$10\$eHbeSoZcqrM8GT.W/TkZXufWe2WjTUVrC0S1AvvfAkth1L28QDpx2', 21, '1c9a295e33d38edad51101b95b659d4338d0cda1b8f8571783e6d582908244951f529940089102d0b7c27c83e15201ef0de27605ac2ac6a525d1d0e57b83b8c6', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(28, 'Constance', 'Wiggins', 'pirzenthaljames@gmail.com', 'Connie', '\$2y\$10\$mKJqRD4gdQZitfH7dY1Zie/D6B63MW/UHwZxn8aXxkUVung7wcfNG', 32, '2bb46fba2c496f7f0605b3f783d396c477a7c56670fbb232a24d3f568ae875c66384475a5cd9cc7d9389d8b479c367e44a4e8a3e18c0af3004031d717dae531b', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(29, 'Skyler', 'Carson', 'pirzenthaljames@gmail.com', 'Skyler', '\$2y\$10\$3EPgdBhtAHeJB4M/1aCV8eAr3Ij/iJx8mZAz8Khe83N4ljOAb7baq', 35, '65c6982fe9b8b928e80eb6e1380235fd4b2775d6d25bdc0a01b93f81d0a64436ee8fd3c96ec66b90d37a3557d34964328ae931f33884bb623575a5816283d25b', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(30, 'Willow', 'Vega', 'pirzenthaljames@gmail.com', 'Willow', '\$2y\$10\$YH7TI2b3wmJYHFeQpv5iAeXDQab9QRPIFVuIiTRL4xeRIPg8epQRa', 34, '6f35e80c8eb992d7e11e0848f71507927f60e558afec2014a2e86545ab0b3530cbae17bf3156abe5397563fd2720e6cb50c03bdafac7cd7431f32216d11bc74e', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(31, 'Kylie', 'Knox', 'pirzenthaljames@gmail.com', 'Kylie', '\$2y\$10\$xC//rVUWxDXrcfb/2eUD2eJc090KtqRVkrRlXZaTnBV8D3diqcCXy', 27, '484800b83392dc6cd2584df55b4fe06c831e86a44e5c293224de4041b8c85f4f3499a3771bb12ae397f5c0cbb3acb6e349354c2bfb2276858f52e146edd2504c', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(32, 'Keely', 'Knash', 'pirzenthaljames@gmail.com', 'Keely', '\$2y\$10\$lTAP9aiwYi0sF5hrP1aqY.EHmefh9MevANq1/.kwfbJC7LIejIRka', 38, 'ff885b220d8e6464f9bb34d01045a717ffe3f051861197ec921a48d27ffaed3bade28c7ad6dead34ad47de776afd725080ee4ff559da29550b83062ad0742c7f', 1, 1, 'Online', 'Online'),
		(33, 'Iona', 'Day', 'pirzenthaljames@gmail.com', 'Iona', '\$2y\$10\$cZsuXrCzFt5LR685fDJUYOSutBS1RGs/pxTt3HU6Y0pNfsZYG9P8u', 30, 'b3b870abb08190df3038e56c6cb2cda8ad4925c571399ecaef2169c78c858f8dafede8a62121401af1ae82f08e18da28d08aeb76f1fe30141504247432886b63', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(34, 'Fay', 'Riddle', 'pirzenthaljames@gmail.com', 'Fay', '\$2y\$10\$dYNa1f1uzIZgI5SmKsfBROoMhZRiLhWmeHgmWGspP/R/95AMAsx2e', 34, '9890844be7d64e84dace103c66b0cb00aa9123d97a5c94e37c3c9e85ba3969dad0a38e3a83a2a6fe420cf9830068d09ec9603a2de963d590ff78743c844c7e7f', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(35, 'Eden', 'Lewis', 'pirzenthaljames@gmail.com', 'Eden', '\$2y\$10\$sar0qCa7RKmwZD1QnYPjAuY8nvKeV79ID2jwAWoRmTNEwje.YGenS', 39, 'fbb4b2c3404a56a61770de55cbf9ca244f54bc6df5b066e56dc2fe8b348b8ff062b069216f6e073ca91ef34db07fb1a056c61e49426899b96916d613dd6d6bf5', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(36, 'Meredith', 'Nichols', 'pirzenthaljames@gmail.com', 'Mere', '\$2y\$10\$Xr5bWLKBz6IST9pwNEMXHum9EnVPvyQIuf5XyHAsOhHnDPyXxtDpa', 68, 'be04a86f6c81c523c2190c2f4a79721940b7c73c3619a76370d0129b13ee9ee9c57627096761f9b346429277ef3e73164afb41ff51a29ed3c611e85c4318a9dc', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(38, 'Jack', 'Sparrow', 'pirzenthaljames@gmail.com', 'Jack', '\$2y\$10\$YERQ8liGa9Tqxlv.s0AQyOKNL/v4OVHYiLd9rUyaVz0DbJN6o6Z2e', 39, 'e0c703a72d4069074e06d17df56e2e6c7968bde78bcf25a9d278e91cc0368b0f267fb88e84cb1b82b8f7b0bdc07f195ef631237257b4ee023947c2ee8406856c', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(39, 'Gregory', 'Larsson', 'pirzenthaljames@gmail.com', 'Greg', '\$2y\$10\$F4ZfT5cmKSX6fNdazPXJGuQ3hASuhvolkdDtmFQhG1ArbhFRa30GO', 26, '58e6fb1996a6e2d14a2cf8a146300b7fa59643944df307cb078c94a604c1b59bebb90c1b5cd1424868f2c9eac5bf560820479403eccd9ef40247571b0f278b24', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(40, 'Matthew', 'Askew', 'pirzenthaljames@gmail.com', 'Matt', '\$2y\$10\$jc95cw5.TEHzjLQJTeE6Berc0c2/hvcBX6.lxB0f0bBkeF6wIk3Zq', 20, '1abf713bb1eb9d9029801a14efa92f9a70b8104d374f001fb91b4d17a37bbb7a3b59eb2f86c7f0142700c2e9d9f71ff79b1e774191e7579c9ff990dbfeab6bab', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(41, 'test', 'tes', 'pirzenthaljames@gmail.com', 'test', '\$2y\$10\$PGRKc/NgTKlpD2Otgv1B.uR3Nwjp7yOgEYens4XXFcGs4v44nBRtC', 200, 'e32f117b651600e49aa4b5a9d5f8a9db469c874506858a1e0c345e4d0ae1e15c2023edae45a1cd308772bd40d9f3341e7e34d87e25d3496271c9d9622d9e7d10', 1, 0, 'Offline', '2018-12-13 02-15-34pm'),
		(42, 'pieter', 'dupreez', 'pirzenthaljames@gmail.com', 'loop', '\$2y\$10\$Qp/Jgv2EO18dlx.MrsboSucSmTRy2GZ4Vqp/y2xtjEM55UuztNbjS', 1000000, '9eca3f00a752aad45aabce80c2de40a11067c8bda55261303545f665d841ea66a188cfb43081708e0ad873e7997e4f6680c8b676dcbc7eabaf5ed151fc7739f3', 1, 1, 'Offline', '2018-12-13 02-15-34pm'),
		(43, 'meat', 'loaf', 'pirzenthaljames@gmail.com', 'meatloaf', '\$2y\$10\$4WXYPY3UAhMl4jWWt2zSZO0orLE42spVlzQF2x6rJcn33OKe5pJ52', 18, 'cc041bcd0f900fd0c93ae5d56726c4f19cb62f3e0b69eca8eeca8eeef83b67bc07c4825c3461fa0519f9af08f4ff8c0af58fa6d3b9a9be16557d34caac0caa18', 1, 1, 'Offline', '2018-12-13 02-41-59pm'),
		(44, 'Runty', 'McRunter', 'pirzenthaljames@gmail.com', 'Runty', '\$2y\$10\$baiY7VYE2PdihZ1D/.hiVeP/alY3mA/gN8iywX/D9q.Y8U2BRO3Gu', 42, 'e951238b46bd0e919ce606be8b6a16ed4550f582289ef06ee2ad8d04b625ea61e8075c6ec1ea3dc8a6c8a97693e8d6a803cf946bfab8928574a9bbd68d8c008c', 1, 1, 'Offline', '2018-12-14 10-04-23am'),
		(45, 'Lex', 'Luthor', 'pirzenthaljames@gmail.com', 'Lex', '\$2y\$10\$ZKI9Xxc0LBUpszh8Cvc/o.Px/YzJ1b4xJ3v39FWsQyX9l0ZBwoBFO', 35, 'e10dd829a9650a594bc6fa06ceb9a5115ddce0b3472bc28910550e91b763aef9773e19564aba5ef84e946a06fff8140300177df2b982c4a0191a306b1ebfea89', 1, 1, 'Online', 'Online');";

		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}


	}



	function cr_likes($conn)
	{
		//create the table
		$sql = "CREATE TABLE `likes` (
			`likes_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`likes_profile` int(11) NOT NULL,
			`likes_user` int(11) NOT NULL
		  )";

		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}


		//populate database
		$sql = "INSERT INTO `likes` (`likes_id`, `likes_profile`, `likes_user`) VALUES
		(1, 6, 23),
		(2, 23, 6),
		(3, 23, 6),
		(4, 23, 6),
		(5, 23, 6),
		(6, 6, 23),
		(7, 6, 23),
		(8, 6, 23),
		(10, 4, 1),
		(12, 22, 2),
		(20, 22, 1),
		(23, 5, 42),
		(24, 20, 42),
		(25, 32, 1),
		(26, 1, 32);";

		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}
	}



	function cr_block($conn)
	{
		$sql = "CREATE TABLE `block` (
			`block_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`block_user` varchar(256) NOT NULL,
			`block_blocker` varchar(256) NOT NULL,
			`block_msg` varchar(256) DEFAULT NULL
		  )";

		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}



		$sql = "INSERT INTO `block` (`block_id`, `block_user`, `block_blocker`, `block_msg`) VALUES
		(1, '23', '1', 'She was a bit of a cunt...'),
		(2, '24', '1', 'i dont like you'),
		(3, '24', '2', 'asdfadf'),
		(4, '25', '2', 'she too old man'),
		(5, '4', '6', 'poop'),
		(6, '15', '42', 'adsdsasdas');";

		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}
	}


	function cr_matches($conn)
	{
		$sql = "CREATE TABLE `matches` (
			`match_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`match_p1` int(11) NOT NULL,
			`match_p2` int(11) NOT NULL
		  )";

		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}
	}



	function cr_pref($conn)
	{
		$sql = "CREATE TABLE `preferences` (
			`pref_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`pref_gender` varchar(256) NOT NULL,
			`pref_sex` varchar(256) NOT NULL,
			`pref_bio` varchar(256) NOT NULL,
			`pref_uid` int(11) NOT NULL UNIQUE KEY,
			`pref_profile` varchar(256) NOT NULL DEFAULT '../imgs/profile-1.jpeg',
			`pref_ot-pic1` varchar(256) DEFAULT NULL,
			`pref_ot-pic2` varchar(256) DEFAULT NULL,
			`pref_ot-pic3` varchar(256) DEFAULT NULL,
			`pref_ot-pic4` varchar(256) DEFAULT NULL,
			`pref_tags` longtext,
			`pref_views` int(11) NOT NULL DEFAULT '0',
			`pref_fameRate` int(11) DEFAULT NULL
		  )";

		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}


		$sql = "INSERT INTO `preferences` (`pref_id`, `pref_gender`, `pref_sex`, `pref_bio`, `pref_uid`, `pref_profile`, `pref_ot-pic1`, `pref_ot-pic2`, `pref_ot-pic3`, `pref_ot-pic4`, `pref_tags`, `pref_views`, `pref_fameRate`) VALUES
		(1, 'Male', 'Heterosexual', '&lt;script&gt;alert(&quot;motherFucker&quot;)&lt;/script&gt;', 1, '../imgs/profile-1.jpg', '../imgs/ot-pic1-1.png', '../imgs/ot-pic2-1.jpg', '../imgs/ot-pic3-1.jpg', '../imgs/ot-pic4-1.jpg', 'Cake,Clubbing,Movies_&_Series,Swimming,Airbrushing\r\n', 4, 110),
		(2, 'Male', 'Heterosexual', 'i dont like Pie', 2, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Cake,Coffee,Surfing,Reading,Cricket,Making_Music,Listening_to_Music,420,Cycling,Airbrushing,Beachcombing\r\n', 0, 99),
		(3, 'Male', 'Bisexual', 'i Like Pie', 3, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, NULL, 0, 101),
		(4, 'Female', 'Heterosexual', 'i Like 420', 4, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, NULL, 0, 107),
		(5, 'Male', 'Homosexual', 'I like Being Sick....\r\nand Bois ;)', 5, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, NULL, 6, 99),
		(6, 'Male', 'Heterosexual', 'I love Women. ALL of them....', 6, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Squash,420,Swimming,Cycling,Pizza,Surfing,Aeromodeling,Building_Dollhouses,Ziplining\r\n', 0, 101),
		(7, 'Male', 'Heterosexual', 'This is a bio', 7, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Cake,Making_Music,Movies_&_Series,Cycling,Clubbing,Art', 0, 100),
		(8, 'Male', 'Heterosexual', 'This is a bio', 8, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Clubbing,Hockey,Martial_Arts,Listening_to_Music,Cycling,Cricket,Making_Music,Rugby,Surfing,Squash', 0, 95),
		(9, 'Male', 'Heterosexual', 'This is a bio', 9, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Cricket,Rugby,Martial_Arts,Cycling,Hockey,Listening_to_Music,Movies_&_Series,Making_Music,Squash', 0, 120),
		(10, 'Male', 'Heterosexual', 'This is a bio', 10, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Squash,Making_Music,Art,Reading,Cycling,Clubbing,Movies_&_Series,Hockey,Martial_Arts,Cricket', 0, 108),
		(11, 'Male', 'Heterosexual', 'This is a bio', 11, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Rugby,Listening_to_Music,Cricket,Martial_Arts,Cycling,Hockey,Making_Music,Surfing,Coffee,Movies_&_Series,Squash', 0, 108),
		(12, 'Male', 'Homosexual', 'This is a bio', 12, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Listening_to_Music,Cricket,Squash,Martial_Arts,Hockey,Rugby,Cycling,Making_Music,Clubbing,420,Surfing,Coffee', 0, 100),
		(13, 'Male', 'Homosexual', 'This is a bio', 13, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Listening_to_Music,Squash,Clubbing,Rugby,Cricket,Making_Music,Cycling,Movies_&_Series,Pizza,Martial_Arts,Hockey', 0, 150),
		(14, 'Male', 'Homosexual', 'This is a bio', 14, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, NULL, 0, 95),
		(15, 'Male', 'Homosexual', 'This is a bio', 15, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Clubbing,Making_Music,Listening_to_Music,Rugby,Surfing,Squash,Cake,420,Hockey,Cycling,Coffee,Cricket,Movies_&_Series', 0, 120),
		(16, 'Male', 'Homosexual', 'This is a bio', 16, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, NULL, 0, 108),
		(17, 'Male', 'Bisexual', 'This is a bio', 17, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Martial_Arts,Movies_&_Series,Rugby,Pizza,Hockey,Reading,Cricket,Cycling,Making_Music,Listening_to_Music,Squash', 0, 100),
		(18, 'Male', 'Bisexual', 'This is a bio', 18, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Martial_Arts,Cycling,Cricket,Making_Music,Listening_to_Music,Clubbing,Hockey,420,Surfing', 0, 60),
		(19, 'Male', 'Bisexual', 'This is a bio', 19, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Squash,Making_Music,Cycling,Hockey,Rugby,Cricket,Listening_to_Music,Clubbing,Surfing,Coffee,Martial_Arts,Cake', 0, 108),
		(20, 'Male', 'Bisexual', 'This is a bio', 20, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Martial_Arts,Cycling,Hockey,Rugby,Cricket,Making_Music,Listening_to_Music,Squash,Clubbing,420', 0, 95),
		(21, 'Male', 'Bisexual', 'This is a bio', 21, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Listening_to_Music,Squash,Martial_Arts,Cycling,Hockey,Rugby,Making_Music,Surfing,Art,Swimming', 0, 120),
		(22, 'Female', 'Heterosexual', 'This is a bio', 22, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Squash,Making_Music,Rugby,Hockey,Martial_Arts,Listening_to_Music,Clubbing,420', 0, 109),
		(23, 'Female', 'Heterosexual', 'This is a bio', 23, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Cycling,Hockey,Rugby,Cricket,Making_Music,Listening_to_Music,Squash,Clubbing,420,Martial_Arts,Movies_&_Series,Reading', 0, 101),
		(24, 'Female', 'Heterosexual', 'This is a bio', 24, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Martial_Arts,Hockey,Making_Music,Rugby,Listening_to_Music,Squash,Clubbing,420,Reading,Swimming,Art,Movies_&_Series', 0, 102),
		(25, 'Female', 'Heterosexual', 'This is a bio', 25, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Making_Music,Listening_to_Music,Squash,Clubbing,Surfing,Rugby,Cricket,420,Coffee,Cake,Movies_&_Series', 0, 108),
		(26, 'Female', 'Heterosexual', 'This is a bio', 26, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Martial_Arts,Cycling,Hockey,Rugby,Pizza,Reading,Movies_&_Series,Cricket,Squash,Listening_to_Music', 0, 95),
		(27, 'Female', 'Homosexual', 'This is a bio', 27, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Rugby,Movies_&_Series,Martial_Arts,420,Squash,Pizza,Listening_to_Music,Cricket', 0, 100),
		(28, 'Female', 'Homosexual', 'This is a bio', 28, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Making_Music,Martial_Arts,Cycling,Hockey,Rugby,Cricket,Listening_to_Music,Squash,Clubbing,420', 0, 120),
		(29, 'Female', 'Homosexual', 'This is a bio', 29, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Listening_to_Music,Squash,Making_Music,Martial_Arts', 0, 79),
		(30, 'Female', 'Homosexual', 'This is a bio', 30, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Listening_to_Music,Making_Music,Squash,Martial_Arts,Pizza,Reading,Movies_&_Series,420', 0, 115),
		(31, 'Female', 'Homosexual', 'This is a bio', 31, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Listening_to_Music,Rugby,Pizza,Reading,Hockey,Cricket,Making_Music,Movies_&_Series', 0, 108),
		(32, 'Female', 'Bisexual', 'This is a bio', 32, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Cycling,Martial_Arts,Hockey,Rugby,Listening_to_Music,Making_Music,Movies_&_Series,Swimming', 0, 101),
		(33, 'Female', 'Bisexual', 'This is a bio', 33, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Hockey,Cycling,Movies_&_Series,Martial_Arts,Listening_to_Music,Making_Music,Swimming', 0, 95),
		(34, 'Female', 'Bisexual', 'This is a bio', 34, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Movies_&_Series,Making_Music,Listening_to_Music,Martial_Arts,Swimming,Clubbing', 0, 120),
		(35, 'Female', 'Bisexual', 'This is a bio', 35, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Art,Coffee,420,Cake,Pizza,Reading,Rugby', 0, 96),
		(36, 'Female', 'Bisexual', 'This is a Bio', 36, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Couponing,Brazilian_jiu-jitsu,Collecting_Music_Albums,Building_Dollhouses,Collecting_Sports_Cards_(Baseball,_Hockey),Building_A_House_For_Habitat_For_Humanity,Bringing_Food_To_The_Disabled,Collecting_RPM_Records,Digital_Photography,Collecting,Coffee,Collecting_Sports_Cards_(Baseball,_Football,_Basketball,_Hockey),Mahjong,Writing', 0, 108),
		(38, 'Female', 'Bisexual', 'Where is all the RUM!!!', 38, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Animal_fancy,Amateur_geology,Coin_Collecting,Collecting_Artwork,Animals/pets/dogs,Brazilian_jiu-jitsu,Crossword_Puzzles,Cryptography,Collecting_Swords,Dumpster_Diving', 0, 100),
		(39, 'Male', 'Bisexual', 'afasdfadfa', 39, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, NULL, 0, 100),
		(41, 'Male', 'Heterosexual', 'I like swimming', 40, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, NULL, 0, NULL),
		(42, 'Female', 'Homosexual', 'dsaasdsada', 42, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, 'Cartooning,Fencing,Beach/Sun_tanning,Auto_racing,Drawing,Climbing,Computer_programming,Eating_out,Bringing_Food_To_The_Disabled', 0, 100),
		(43, 'Female', 'Heterosexual', 'Hello itsa me', 43, '../imgs/profile-1.jpeg', NULL, NULL, NULL, NULL, '3D_printing,Acting', 0, NULL),
		(44, 'Male', 'Homosexual', 'this is a bio', 44, '../imgs/profile-44.jpg', '../imgs/ot-pic1-44.jpg', '../imgs/ot-pic2-44.jpg', '../imgs/ot-pic3-44.jpg', '../imgs/ot-pic4-44.jpg', 'Art_collecting,Body_Building,Aquarium_(Freshwater_&_Saltwater),Cake_Decorating,Cross-Stitch,Brewing_Beer,Amateur_geology,Animal_fancy,Spelunkering,Stone_skipping,Roller_derby,Spending_time_with_family/kids', 0, NULL),
		(45, 'Male', 'Heterosexual', 'I want to kill superman', 45, '../imgs/profile-45.jpg', '../imgs/ot-pic1-45.jpg', '../imgs/ot-pic2-45.jpg', '../imgs/ot-pic3-45.jpg', '../imgs/ot-pic4-45.jpg', 'American_football,Exercise_(aerobics,_weights),Curling,Dog_sport,Couponing,Rescuing_Abused_Or_Abandoned_Animals,Zumba', 0, NULL);";

		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}
	}


	function cr_reports($conn)
	{
		$sql = "CREATE TABLE `reports` (
			`rep_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`rep_reportee` varchar(256) NOT NULL,
			`rep_reporter` varchar(256) NOT NULL,
			`rep_msg` varchar(256) NOT NULL
		  )";

		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}



		$sql = "INSERT INTO `reports` (`rep_id`, `rep_reportee`, `rep_reporter`, `rep_msg`) VALUES
		(1, '5', '1', 'adfadfadf'),
		(2, '2', '1', 'I just dont like him...'),
		(3, '1', '2', 'penis'),
		(4, '1', '2', 'asdfadfadf')";


		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}
	}


	function cr_tags($conn)
	{
		$sql = "CREATE TABLE `tags` (
			`tag_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`tag_name` varchar(256) NOT NULL
		  )";

		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}



		$sql = "INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
		(1, '3D_printing'),
		(2, '420'),
		(3, 'Acting'),
		(4, 'Aeromodeling'),
		(5, 'Air_sports'),
		(6, 'Airbrushing'),
		(7, 'Aircraft_Spotting'),
		(8, 'Airsoft'),
		(9, 'Airsofting'),
		(10, 'Amateur_astronomy'),
		(11, 'Amateur_geology'),
		(12, 'Amateur_Radio'),
		(13, 'American_football'),
		(14, 'Animal_fancy'),
		(15, 'Animals/pets/dogs'),
		(16, 'Antiquing'),
		(17, 'Antiquities'),
		(18, 'Aqua-lung'),
		(19, 'Aquarium_(Freshwater_&_Saltwater)'),
		(20, 'Archery'),
		(21, 'Art_collecting'),
		(22, 'Arts'),
		(23, 'Art'),
		(24, 'Association_football'),
		(25, 'Astrology'),
		(26, 'Astronomy'),
		(27, 'Audiophilia'),
		(28, 'Australian_rules_football'),
		(29, 'Auto_audiophilia'),
		(30, 'Auto_racing'),
		(31, 'Backgammon'),
		(32, 'Backpacking'),
		(33, 'Badminton'),
		(34, 'Base_Jumping'),
		(35, 'Baseball'),
		(36, 'Basketball'),
		(37, 'Baton_Twirling'),
		(38, 'Beach_Volleyball'),
		(39, 'Beach/Sun_tanning'),
		(40, 'Beachcombing'),
		(41, 'Beadwork'),
		(42, 'Beatboxing'),
		(43, 'Becoming_A_Child_Advocate'),
		(44, 'Beekeeping'),
		(45, 'Bell_Ringing'),
		(46, 'Belly_Dancing'),
		(47, 'Bicycle_Polo'),
		(48, 'Bicycling'),
		(49, 'Billiards'),
		(50, 'Bird_watching'),
		(51, 'Birding'),
		(52, 'Birdwatching'),
		(53, 'Blacksmithing'),
		(54, 'Blogging'),
		(55, 'BMX'),
		(56, 'Board_games'),
		(57, 'Board_sports'),
		(58, 'BoardGames'),
		(59, 'Boating'),
		(60, 'Body_Building'),
		(61, 'Bodybuilding'),
		(62, 'Bonsai_Tree'),
		(63, 'Book_collecting'),
		(64, 'Bookbinding'),
		(65, 'Boomerangs'),
		(66, 'Bowling'),
		(67, 'Boxing'),
		(68, 'Brazilian_jiu-jitsu'),
		(69, 'Breakdancing'),
		(70, 'Brewing_Beer'),
		(71, 'Bridge'),
		(72, 'Bridge_Building'),
		(73, 'Bringing_Food_To_The_Disabled'),
		(74, 'Building_A_House_For_Habitat_For_Humanity'),
		(75, 'Building_Dollhouses'),
		(76, 'Bus_spotting'),
		(77, 'Butterfly_Watching'),
		(78, 'Button_Collecting'),
		(79, 'Cake'),
		(80, 'Cake_Decorating'),
		(81, 'Calligraphy'),
		(82, 'Camping'),
		(83, 'Candle_making'),
		(84, 'Canoeing'),
		(85, 'Car_Racing'),
		(86, 'Card_collecting'),
		(87, 'Cartooning'),
		(88, 'Casino_Gambling'),
		(89, 'Cave_Diving'),
		(90, 'Ceramics'),
		(91, 'Cheerleading'),
		(92, 'Chess'),
		(93, 'Church/church_activities'),
		(94, 'Cigar_Smoking'),
		(95, 'Climbing'),
		(96, 'Cloud_Watching'),
		(97, 'Clubbing'),
		(98, 'Coffee'),
		(99, 'Coin_Collecting'),
		(100, 'Collecting'),
		(101, 'Collecting_Antiques'),
		(102, 'Collecting_Artwork'),
		(103, 'Collecting_Hats'),
		(104, 'Collecting_Music_Albums'),
		(105, 'Collecting_RPM_Records'),
		(106, 'Collecting_Sports_Cards_(Baseball,_Football,_Basketball,_Hockey)'),
		(107, 'Collecting_Swords'),
		(108, 'Color_guard'),
		(109, 'Coloring'),
		(110, 'Comic_book_collecting'),
		(111, 'Compose_Music'),
		(112, 'Computer_activities'),
		(113, 'Computer_programming'),
		(114, 'Conworlding'),
		(115, 'Cooking'),
		(116, 'Cosplay'),
		(117, 'Cosplaying'),
		(118, 'Couponing'),
		(119, 'Crafts'),
		(120, 'Crafts_(unspecified)'),
		(121, 'Creative_writing'),
		(122, 'Cricket'),
		(123, 'Crochet'),
		(124, 'Crocheting'),
		(125, 'Cross-Stitch'),
		(126, 'Crossword_Puzzles'),
		(127, 'Cryptography'),
		(128, 'Curling'),
		(129, 'Cycling'),
		(130, 'Dance'),
		(131, 'Dancing'),
		(132, 'Darts'),
		(133, 'Debate'),
		(134, 'Deltiology_(postcard_collecting)'),
		(135, 'Diecast_Collectibles'),
		(136, 'Digital_arts'),
		(137, 'Digital_Photography'),
		(138, 'Disc_golf'),
		(139, 'Do_it_yourself'),
		(140, 'Dodgeball'),
		(141, 'Dog_sport'),
		(142, 'Dolls'),
		(143, 'Dominoes'),
		(144, 'Dowsing'),
		(145, 'Drama'),
		(146, 'Drawing'),
		(147, 'Driving'),
		(148, 'Dumpster_Diving'),
		(149, 'Eating_out'),
		(150, 'Educational_Courses'),
		(151, 'Electronics'),
		(152, 'Element_collecting'),
		(153, 'Embroidery'),
		(154, 'Entertaining'),
		(155, 'Equestrianism'),
		(156, 'Exercise_(aerobics,_weights)'),
		(157, 'Exhibition_drill'),
		(158, 'Falconry'),
		(159, 'Fast_cars'),
		(160, 'Felting'),
		(161, 'Fencing'),
		(162, 'Field_hockey'),
		(163, 'Figure_skating'),
		(164, 'Fire_Poi'),
		(165, 'Fishing'),
		(166, 'Fishkeeping'),
		(167, 'Flag_Football'),
		(168, 'Floorball'),
		(169, 'Floral_Arrangements'),
		(170, 'Flower_arranging'),
		(171, 'Flower_collecting_and_pressing'),
		(172, 'Fly_Tying'),
		(173, 'Flying'),
		(174, 'Footbag'),
		(175, 'Football'),
		(176, 'Foraging'),
		(177, 'Foreign_language_learning'),
		(178, 'Fossil_hunting'),
		(179, 'Four_Wheeling'),
		(180, 'Freshwater_Aquariums'),
		(181, 'Frisbee_Golf_–_Frolf'),
		(182, 'Gambling'),
		(183, 'Games'),
		(184, 'Gaming_(tabletop_games_and_role-playing_games)'),
		(185, 'Garage_Saleing'),
		(186, 'Gardening'),
		(187, 'Genealogy'),
		(188, 'Geocaching'),
		(189, 'Ghost_hunting'),
		(190, 'Glassblowing'),
		(191, 'Glowsticking'),
		(192, 'Gnoming'),
		(193, 'Go'),
		(194, 'Go_Kart_Racing'),
		(195, 'Going_to_movies'),
		(196, 'Golf'),
		(197, 'Golfing'),
		(198, 'Gongoozling'),
		(199, 'Graffiti'),
		(200, 'Grip_Strength'),
		(201, 'Guitar'),
		(202, 'Gun_Collecting'),
		(203, 'Gunsmithing'),
		(204, 'Gymnastics'),
		(205, 'Gyotaku'),
		(206, 'Handball'),
		(207, 'Handwriting_Analysis'),
		(208, 'Hang_gliding'),
		(209, 'Herping'),
		(210, 'Hiking'),
		(211, 'Hockey'),
		(212, 'Home_Brewing'),
		(213, 'Home_Repair'),
		(214, 'Home_Theater'),
		(215, 'Homebrewing'),
		(216, 'Hooping'),
		(217, 'Horse_riding'),
		(218, 'Hot_air_ballooning'),
		(219, 'Hula_Hooping'),
		(220, 'Hunting'),
		(221, 'Ice_hockey'),
		(222, 'Ice_skating'),
		(223, 'Iceskating'),
		(224, 'Illusion'),
		(225, 'Impersonations'),
		(226, 'Inline_skating'),
		(227, 'Insect_collecting'),
		(228, 'Internet'),
		(229, 'Inventing'),
		(230, 'Jet_Engines'),
		(231, 'Jewelry_Making'),
		(232, 'Jigsaw_Puzzles'),
		(233, 'Jogging'),
		(234, 'Judo'),
		(235, 'Juggling'),
		(236, 'Jukskei'),
		(237, 'Jump_Roping'),
		(238, 'Kabaddi'),
		(239, 'Kart_racing'),
		(240, 'Kayaking'),
		(241, 'Keep_A_Journal'),
		(242, 'Kitchen_Chemistry'),
		(243, 'Kite_Boarding'),
		(244, 'Kite_flying'),
		(245, 'Kites'),
		(246, 'Kitesurfing'),
		(247, 'Knapping'),
		(248, 'Knife_making'),
		(249, 'Knife_throwing'),
		(250, 'Knitting'),
		(251, 'Knotting'),
		(252, 'Lacemaking'),
		(253, 'Lacrosse'),
		(254, 'Lapidary'),
		(255, 'LARPing'),
		(256, 'Laser_tag'),
		(257, 'Lasers'),
		(258, 'Lawn_Darts'),
		(259, 'Learn_to_Play_Poker'),
		(260, 'Learning_A_Foreign_Language'),
		(261, 'Learning_An_Instrument'),
		(262, 'Learning_To_Pilot_A_Plane'),
		(263, 'Leather_crafting'),
		(264, 'Leathercrafting'),
		(265, 'Lego_building'),
		(266, 'Legos'),
		(267, 'Letterboxing'),
		(268, 'Listening_to_Music'),
		(269, 'Locksport'),
		(270, 'Machining'),
		(271, 'Macramé'),
		(272, 'Macrame'),
		(273, 'Magic'),
		(274, 'Mahjong'),
		(275, 'Making_Model_Cars'),
		(276, 'Making_Music'),
		(277, 'Marbles'),
		(278, 'Marksmanship'),
		(279, 'Martial_Arts'),
		(280, 'Matchstick_Modeling'),
		(281, 'Meditation'),
		(282, 'Metal_detecting'),
		(283, 'Meteorology'),
		(284, 'Microscopy'),
		(285, 'Mineral_collecting'),
		(286, 'Model_aircraft'),
		(287, 'Model_building'),
		(288, 'Model_Railroading'),
		(289, 'Model_Rockets'),
		(290, 'Modeling_Ships'),
		(291, 'Models'),
		(292, 'Motor_sports'),
		(293, 'Motorcycles'),
		(294, 'Mountain_Biking'),
		(295, 'Mountain_Climbing'),
		(296, 'Mountaineering'),
		(297, 'Movie_and_movie_memorabilia_collecting'),
		(298, 'Movies_&_Series'),
		(299, 'Mushroom_hunting/Mycology'),
		(300, 'Musical_Instruments'),
		(301, 'Nail_Art'),
		(302, 'Needlepoint'),
		(303, 'Netball'),
		(304, 'Nordic_skating'),
		(305, 'Orienteering'),
		(306, 'Origami'),
		(307, 'Owning_An_Antique_Car'),
		(308, 'Paintball'),
		(309, 'Painting'),
		(310, 'Papermache'),
		(311, 'Papermaking'),
		(312, 'Parachuting'),
		(313, 'Paragliding_or_Power_Paragliding'),
		(314, 'Parkour'),
		(315, 'People_Watching'),
		(316, 'Photography'),
		(317, 'Piano'),
		(318, 'Pigeon_racing'),
		(319, 'Pinochle'),
		(320, 'Pipe_Smoking'),
		(321, 'Pizza'),
		(322, 'Planking'),
		(323, 'Playing_music'),
		(324, 'Playing_musical_instruments'),
		(325, 'Playing_team_sports'),
		(326, 'Poker'),
		(327, 'Pole_Dancing'),
		(328, 'Polo'),
		(329, 'Pottery'),
		(330, 'Powerboking'),
		(331, 'Protesting'),
		(332, 'Puppetry'),
		(333, 'Puzzles'),
		(334, 'Pyrotechnics'),
		(335, 'Quilting'),
		(336, 'R/C_Boats'),
		(337, 'R/C_Cars'),
		(338, 'R/C_Helicopters'),
		(339, 'R/C_Planes'),
		(340, 'Racing_Pigeons'),
		(341, 'Racquetball'),
		(342, 'Radio-controlled_car_racing'),
		(343, 'Rafting'),
		(344, 'Railfans'),
		(345, 'Rappelling'),
		(346, 'Rapping'),
		(347, 'Reading'),
		(348, 'Reading_To_The_Elderly'),
		(349, 'Record_collecting'),
		(350, 'Relaxing'),
		(351, 'Renaissance_Faire'),
		(352, 'Renting_movies'),
		(353, 'Rescuing_Abused_Or_Abandoned_Animals'),
		(354, 'Robotics'),
		(355, 'Rock_balancing'),
		(356, 'Rock_climbing'),
		(357, 'Rock_Collecting'),
		(358, 'Rockets'),
		(359, 'Rocking_AIDS_Babies'),
		(360, 'Roleplaying'),
		(361, 'Roller_derby'),
		(362, 'Roller_skating'),
		(363, 'Rugby'),
		(364, 'Rugby_league_football'),
		(365, 'Running'),
		(366, 'Sailing'),
		(367, 'Saltwater_Aquariums'),
		(368, 'Sand_art'),
		(369, 'Sand_Castles'),
		(370, 'Scrapbooking'),
		(371, 'Scuba_diving'),
		(372, 'Sculling_or_Rowing'),
		(373, 'Sculpting'),
		(374, 'Sea_glass_collecting'),
		(375, 'Seashell_collecting'),
		(376, 'Self_Defense'),
		(377, 'Sewing'),
		(378, 'Shark_Fishing'),
		(379, 'Shooting'),
		(380, 'Shooting_sport'),
		(381, 'Shopping'),
		(382, 'Shortwave_listening'),
		(383, 'Singing'),
		(384, 'Singing_In_Choir'),
		(385, 'Skateboarding'),
		(386, 'Skeet_Shooting'),
		(387, 'Sketching'),
		(388, 'Skiing'),
		(389, 'Skimboarding'),
		(390, 'Sky_Diving'),
		(391, 'Skydiving'),
		(392, 'Slack_Lining'),
		(393, 'Slacklining'),
		(394, 'Sleeping'),
		(395, 'Slingshots'),
		(396, 'Slot_car_racing'),
		(397, 'Snorkeling'),
		(398, 'Snowboarding'),
		(399, 'Soap_Making'),
		(400, 'Soapmaking'),
		(401, 'Soccer'),
		(402, 'Socializing_with_friends/neighbors'),
		(403, 'Speed_Cubing_(rubix_cube)'),
		(404, 'Speed_skating'),
		(405, 'Spelunkering'),
		(406, 'Spending_time_with_family/kids'),
		(407, 'Sports'),
		(408, 'Squash'),
		(409, 'Stamp_Collecting'),
		(410, 'Stand-up_comedy'),
		(411, 'Stone_collecting'),
		(412, 'Stone_skipping'),
		(413, 'Storm_Chasing'),
		(414, 'Storytelling'),
		(415, 'String_Figures'),
		(416, 'Sudoku'),
		(417, 'Surf_Fishing'),
		(418, 'Surfing'),
		(419, 'Survival'),
		(420, 'Swimming'),
		(421, 'Table_football'),
		(422, 'Table_tennis'),
		(423, 'Taekwondo'),
		(424, 'Tai_chi'),
		(425, 'Tatting'),
		(426, 'Taxidermy'),
		(427, 'Tea_Tasting'),
		(428, 'Tennis'),
		(429, 'Tesla_Coils'),
		(430, 'Tetris'),
		(431, 'Textiles'),
		(432, 'Texting'),
		(433, 'Tombstone_Rubbing'),
		(434, 'Tool_Collecting'),
		(435, 'Tour_skating'),
		(436, 'Toy_Collecting'),
		(437, 'Train_Collecting'),
		(438, 'Train_Spotting'),
		(439, 'Trainspotting'),
		(440, 'Traveling'),
		(441, 'Treasure_Hunting'),
		(442, 'Trekkie'),
		(443, 'Triathlon'),
		(444, 'Tutoring_Children'),
		(445, 'TV_watching'),
		(446, 'Ultimate_Frisbee'),
		(447, 'Urban_exploration'),
		(448, 'Vehicle_restoration'),
		(449, 'Video_game_collecting'),
		(450, 'Video_Games'),
		(451, 'Video_gaming'),
		(452, 'Videophilia'),
		(453, 'Vintage_cars'),
		(454, 'Violin'),
		(455, 'Volleyball'),
		(456, 'Volunteer'),
		(457, 'Walking'),
		(458, 'Warhammer'),
		(459, 'Watching_movies'),
		(460, 'Watching_sporting_events'),
		(461, 'Water_sports'),
		(462, 'Weather_Watcher'),
		(463, 'Web_surfing'),
		(464, 'Weightlifting'),
		(465, 'Windsurfing'),
		(466, 'Wine_Making'),
		(467, 'Wingsuit_Flying'),
		(468, 'Wood_carving'),
		(469, 'Woodworking'),
		(470, 'Working_In_A_Food_Pantry'),
		(471, 'Working_on_cars'),
		(472, 'World_Record_Breaking'),
		(473, 'Worldbuilding'),
		(474, 'Wrestling'),
		(475, 'Writing'),
		(476, 'Writing_Music'),
		(477, 'Writing_Songs'),
		(478, 'Yo-yoing'),
		(479, 'Yoga'),
		(480, 'YoYo'),
		(481, 'Ziplining'),
		(482, 'Zumba');";


		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}
	}



	function cr_views($conn)
	{
		$sql = "CREATE TABLE `views` (
			`views_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`views_usee` varchar(256) NOT NULL,
			`views_user` varchar(256) NOT NULL
		  )";

		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}



		$sql = "INSERT INTO `views` (`views_id`, `views_usee`, `views_user`) VALUES
		(1, '1', '6'),
		(2, '1', '5'),
		(3, '1', '2'),
		(4, '1', '4'),
		(5, '1', '6'),
		(6, '1', '3'),
		(7, '1', '4'),
		(8, '1', '2'),
		(9, '1', '5'),
		(10, '1', '1'),
		(11, '1', '1'),
		(12, '1', '1'),
		(13, '1', '1'),
		(14, '1', '1'),
		(15, '1', '1'),
		(16, '1', '1'),
		(17, '1', '1'),
		(18, '1', '1'),
		(19, '1', '1'),
		(20, '1', '1'),
		(21, '1', '1'),
		(22, '1', '1'),
		(23, '1', '1'),
		(24, '1', '1'),
		(25, '1', '1'),
		(26, '1', '1'),
		(27, '1', '1'),
		(28, '1', '1'),
		(29, '1', '1'),
		(30, '1', '1'),
		(31, '1', '1'),
		(32, '1', '1'),
		(33, '1', '1'),
		(34, '1', '1'),
		(35, '2', '1'),
		(36, '8', '7'),
		(37, '8', '5'),
		(38, '27', '26'),
		(39, '36', '23'),
		(40, '36', '2'),
		(41, '1', '32'),
		(42, '1', '32'),
		(43, '1', '24'),
		(44, '34', '6'),
		(45, '1', '23'),
		(46, '1', '23'),
		(47, '1', '4'),
		(48, '1', '36'),
		(49, '1', '34'),
		(50, '1', '22'),
		(51, '1', '22'),
		(52, '1', '23'),
		(53, '1', '24'),
		(54, '1', '34'),
		(55, '1', '24'),
		(56, '2', '4'),
		(57, '2', '24'),
		(58, '2', '25'),
		(59, '1', '4'),
		(60, '1', '4'),
		(61, '1', '4'),
		(62, '1', '4'),
		(63, '1', '4'),
		(64, '1', '4'),
		(65, '1', '4'),
		(66, '1', '4'),
		(67, '1', '4'),
		(68, '1', '4'),
		(69, '1', '4'),
		(70, '1', '4'),
		(71, '1', '4'),
		(72, '1', '4'),
		(73, '1', '4'),
		(74, '1', '4'),
		(75, '1', '4'),
		(76, '4', '1'),
		(77, '4', '1'),
		(78, '4', '1'),
		(79, '4', '1'),
		(80, '4', '1'),
		(81, '4', '1'),
		(82, '4', '1'),
		(83, '6', '23'),
		(84, '6', '3'),
		(85, '6', '36'),
		(86, '6', '23'),
		(87, '6', '1'),
		(88, '6', '1'),
		(89, '6', '4'),
		(90, '6', '23'),
		(91, '6', '23'),
		(92, '6', '26'),
		(93, '6', '24'),
		(94, '6', '24'),
		(95, '6', '24'),
		(96, '6', '24'),
		(97, '6', '24'),
		(98, '6', '24'),
		(99, '6', '24'),
		(100, '6', '24'),
		(101, '6', '24'),
		(102, '6', '24'),
		(103, '6', '24'),
		(104, '6', '23'),
		(105, '6', '23'),
		(106, '6', '23'),
		(107, '23', '6'),
		(108, '23', '6'),
		(109, '23', '6'),
		(110, '23', '6'),
		(111, '23', '6'),
		(112, '23', '6'),
		(113, '23', '6'),
		(114, '23', '6'),
		(115, '23', '6'),
		(116, '1', '25'),
		(117, '1', '25'),
		(118, '1', '22'),
		(119, '1', '4'),
		(120, '22', '7'),
		(121, '22', '1'),
		(122, '22', '1'),
		(123, '2', '22'),
		(124, '22', '7'),
		(125, '22', '7'),
		(126, '22', '1'),
		(127, '1', '22'),
		(128, '1', '22'),
		(129, '1', '4'),
		(130, '1', '26'),
		(131, '1', '22'),
		(132, '1', '22'),
		(133, '1', '22'),
		(134, '1', '22'),
		(135, '1', '22'),
		(136, '1', '22'),
		(137, '1', '22'),
		(138, '1', '22'),
		(139, '1', '22'),
		(140, '1', '22'),
		(141, '1', '22'),
		(142, '1', '22'),
		(143, '1', '22'),
		(144, '1', '22'),
		(145, '1', '22'),
		(146, '1', '22'),
		(147, '1', '22'),
		(148, '1', '22'),
		(149, '1', '22'),
		(150, '1', '22'),
		(151, '1', '22'),
		(152, '1', '22'),
		(153, '22', '1'),
		(154, '22', '1'),
		(155, '22', '1'),
		(156, '22', '1'),
		(157, '38', '17'),
		(158, '42', '15'),
		(159, '42', '5'),
		(160, '42', '5'),
		(161, '42', '5'),
		(162, '42', '20'),
		(163, '42', '38'),
		(164, '42', '36'),
		(165, '42', '35'),
		(166, '42', '36'),
		(167, '2', '4'),
		(168, '2', '4'),
		(169, '2', '4'),
		(170, '2', '4'),
		(171, '2', '4'),
		(172, '2', '4'),
		(173, '2', '4'),
		(174, '2', '4'),
		(175, '4', '2'),
		(176, '4', '2'),
		(177, '1', '22'),
		(178, '1', '22'),
		(179, '1', '4'),
		(180, '1', '32'),
		(181, '1', '32'),
		(182, '32', '1'),
		(183, '43', '2'),
		(184, '44', '5'),
		(185, '44', '5'),
		(186, '44', '5'),
		(187, '44', '5'),
		(188, '44', '15'),
		(189, '44', '5'),
		(190, '44', '15'),
		(191, '44', '17'),
		(192, '44', '3');";


		try
		{
			$create = $conn->prepare($sql);
			$create->execute();
		}
		catch(PDOException $e)
		{
			echo "<script type='text/javascript'>alert(". $e->getMessage().");</script>";
		}
	}
?>