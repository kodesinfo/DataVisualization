# DataVisualization
한경닷컴 데이터 시작화 

한국언론진흥재단에서 주관하는 '디지털 미디어 서비스 개발 지원 사업 공모'로  한경닷컴과 코드스에서 진행하는 프로젝트임

1. 프로젝트 목표 : 주요 경제지표데이터 API를 DB화 하고 데이터를 바탕으로 차트와 연동하여 서비스를 구성

2. 프로젝트 기간 : 2021.06.01 ~ 2021.10.31

3. 사업범위 :
   1) 주요 통계 지표의 자동 DB 연동 및 API 관리 시스템 
   2) 시각화 차트 기능
   3) 언론사 CMS 기사입력기에 해당 데이터 및 추가데이터로 그래프를 기사에 추가하여 서비스
   4) chartjs를 이용하여 차트 제작

4. 서비스 기능
   1) API로 경제지표를 제공하는 사이트에서 경제지표 DB수집 
   2) 데이터를 한경 Database에 정제하여 수집
   3) 선택된 데이터를 호출할수 있는 API를 통해 서비스
   4) API를 이용하여 기사편집기에서 수집된 데이터를 기사에 차트 표출
   5) 엑셀파일 및 직접 입력하여 그래프를 기사에 표출 
   6) 작성된 그래프를 네이버, 다음 등에 전달할 수 있는 이미지 차트 전송 

5. 개발성과
   1) 데이터 저널리즘의 확대 및 시각화 증대
      ● 경제지표 및 언론사 데이터를 활용한 기사 작성 확대
      ● 데이터의 시각화 요소를 통한 명확하고 효과적인 팩트의 전달
      ● 독자의 명확한 이해 및 기사 활용도 확대
      ● 언론사의 기사 품질 향상 및 포털 뉴스와의 차별화 가능
      ● 포털은 이미지 외에는 모든 시각화 요소를 차단하고 있음

   2) 주요 경제 지표의 흐름 및 이해도 확대
      ● 국가의 주요 경제 지표를 한눈에 파악 가능
      ● 주요 경제 지표의 흐름과 관련 기사를 확인
      ● 도표와 차트가 삽입되어 독자의 이해도 증진
      ● 다양한 경제지표, 통계현황 실시간 서비스

6) Directory 설명
─┬─ Class               웹사이트 프로그램 Class 폴더
 ├─ config              프로그램 세팅 폴더
 ├─ cron                자동실행 프로그램 폴더
 └─ web ┐
        ├─ _compile     _template compile된  폴더 (mode : 777)
        ├─ _template    _template template  폴더
        ├─ css          CSS  폴더
        ├─ data         차트파일 이미지 파일 저장 폴더
        ├─ image        web에 사용될 image  폴더
        ├─ js           Javascript 폴더
        ├─ lib          javascript 외부 lib 폴더
        └─ svg          svg icon 폴더
        

