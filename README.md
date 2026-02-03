
# Community Web Service

>APM 구조를 기반으로 한 커뮤니티 웹 서비스 

---

## 개발 환경
- Oracle VirualBox 7.1.4v
- Image Disk : ubunto-24.04.3
- Apache/2.4.58 (Ubuntu)
- PHP 8.3.6 (cli)
- mysql 8.0.43
- Visual Studio Code

## 파일 구조
```text
.
├── auth
│   └── splitHash.php
├── board
│   ├── edit.php
│   ├── list.php
│   ├── pagination.php
│   ├── read.php
│   └── write.php
├── controllers
│   ├── deleteController.php
│   ├── downloadController.php
│   ├── editController.php
│   ├── loginController.php
│   ├── logoutController.php
│   ├── registerController.php
│   ├── updatePwdController.php
│   └── writeController.php
├── css
├── uploads
├── database.sql
├── utils
│   ├── authGuard.php
│   ├── conDB.php
│   ├── errorCheck.php
│   └── viewSession.php
└── views
    ├── login.php
    ├── main.php
    ├── menu.php
    ├── mypage.php
    └── register.php
```

## 핵심 기능
--**로그인 로직** : 로그인 시 아이디와 비밀번호에 대한 개별적인 식별과 인증을 진행함.(비밀번호는 해시 처리)
--**게시판(board)** : 게시글 목록, 게시글 작성, 수정, 조회 페이지로 구성되어 있음.
--**views** : 회원가입, 로그인, 마이페이지, 메인페이지, 메뉴로 구성되어 있음.
--**Controllers** : 회원가입과 로그아웃, 비밀번호 업데이트, 그리고 게시글 업로드 처리 과정에서 DB 연동 및 데이터 처리 기능 제공
--**파일 업로드 및 다운로드** : 게시글 작성 시 파일 업로드 및 다운로드 기능 지원(참고 : png, jpg 파일은 에러 발생. 수정 필요)

## 기타
-**DB SQL 파일** : database.sql

## 보안성
- 게시판이나 마이페이지, 게시글 조회 및 수정 페이지 접속 시 로그인 유무 확인 및 세션 만료 시 로그인 페이지로 리다이렉트
- 회원가입 시 비밀번호는 DB에 평문 상태가 아닌 sha256 해시값으로 저장되며, 로그인 시 해시값 비교를 통해 회원 식별

## 개선 및 수정 필요 사항
1. **웹 개발 측면** 
- 파일 업로드 및 다운로드 : .png, .jpg 확장자 파일 다운로드 시 원본 확인이 불가능함. 따라서 수정이 필요함.
- 기능 확장 : 게시글 댓글 기능 구축 필요
2. **보안**
- 파일 업로드/다운로드 기능은 보안 측면에서의 안전성을 고려하지 않고 개발만 한 상태라 확인 필요.
- 이외에도 로그인을 포함한 다수의 기능에 대한 점검이 부실함.

